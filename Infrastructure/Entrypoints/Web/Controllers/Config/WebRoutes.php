<?php

declare(strict_types=1);

final class WebRoutes
{
    /**
     * @return array<string, array<string, string>>
     */
    public static function routes(): array
    {
        return array(
            'home' => array(
                'method' => 'GET',
                'action' => 'home',
            ),
            
            // Rutas de Usuarios
            'users.create' => array(
                'method' => 'GET',
                'action' => 'create',
            ),
            'users.store' => array(
                'method' => 'POST',
                'action' => 'store',
            ),
            'users.index' => array(
                'method' => 'GET',
                'action' => 'index',
            ),
            'users.show' => array(
                'method' => 'GET',
                'action' => 'show',
            ),
            'users.edit' => array(
                'method' => 'GET',
                'action' => 'edit',
            ),
            'users.update' => array(
                'method' => 'POST',
                'action' => 'update',
            ),
            'users.delete' => array(
                'method' => 'POST',
                'action' => 'delete',
            ),

            // Rutas de Contratos
            'contratos.create' => array(
                'method' => 'GET',
                'action' => 'contratos.create',
            ),
            'contratos.store' => array(
                'method' => 'POST',
                'action' => 'contratos.store',
            ),
            'contratos.index' => array(
                'method' => 'GET',
                'action' => 'contratos.index',
            ),
            'contratos.show' => array(
                'method' => 'GET',
                'action' => 'contratos.show',
            ),
            'contratos.edit' => array(
                'method' => 'GET',
                'action' => 'contratos.edit',
            ),
            'contratos.update' => array(
                'method' => 'POST',
                'action' => 'contratos.update',
            ),
            'contratos.delete' => array(
                'method' => 'POST',
                'action' => 'contratos.delete',
            ),

            // Rutas de Autenticación
            'auth.login' => array(
                'method' => 'GET',
                'action' => 'login',
            ),
            'auth.authenticate' => array(
                'method' => 'POST',
                'action' => 'authenticate',
            ),
            'auth.logout' => array(
                'method' => 'GET',
                'action' => 'logout',
            ),
            'auth.forgot' => array(
                'method' => 'GET',
                'action' => 'forgot',
            ),
            'auth.forgot.send' => array(
                'method' => 'POST',
                'action' => 'forgot.send',
            ),
        );
    }
}