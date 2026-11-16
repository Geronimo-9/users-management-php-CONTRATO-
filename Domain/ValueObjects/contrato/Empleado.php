<?php

declare(strict_types=1);

require_once __DIR__ . '/TextoNombre.php';

final class Empleado extends TextoNombre
{
    public function __construct(string $valor)
    {
        parent::__construct($valor, 'empleado');
    }
}
