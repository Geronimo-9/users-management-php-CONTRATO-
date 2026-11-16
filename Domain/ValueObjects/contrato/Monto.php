<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Exceptions/FormatoInvalidoExcepcion.php';
require_once __DIR__ . '/../../Exceptions/ValoresNegativosExcepcion.php';

final class Monto
{
    // Se guarda como texto con 2 decimales (coincide con DECIMAL(15,2) y evita errores de float)
    private string $valor;

    public function __construct(string|int|float $monto)
    {
        if (!is_numeric($monto)) {
            throw FormatoInvalidoExcepcion::formatoIncorrecto('monto', (string) $monto);
        }

        if ((float) $monto < 0) {
            throw ValoresNegativosExcepcion::valorNegativo('monto', (string) $monto);
        }

        $this->valor = number_format((float) $monto, 2, '.', '');
    }

    public function value(): string
    {
        return $this->valor;
    }
}