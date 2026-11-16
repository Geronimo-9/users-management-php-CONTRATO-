FROM php:8.2-apache

# Extensiones MySQL y mod_rewrite para rutas limpias
RUN docker-php-ext-install pdo pdo_mysql && a2enmod rewrite

# Permite que PHP lea las variables de entorno de Render en $_ENV y getenv()
RUN echo 'variables_order = "EGPCS"' > /usr/local/etc/php/conf.d/env.ini

# Apunta Apache directamente a tu carpeta /public (donde está tu index.php)
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
    && sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

WORKDIR /var/www/html
COPY . /var/www/html/

# Si tu proyecto tiene composer.json, instala las dependencias automáticamente
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN if [ -f "composer.json" ]; then composer install --no-dev --optimize-autoloader; fi

RUN chown -R www-data:www-data /var/www/html