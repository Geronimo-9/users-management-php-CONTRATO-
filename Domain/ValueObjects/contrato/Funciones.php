<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Exceptions/ParametrosVaciosExcepcion.php';

final class Funciones
{
    private string $texto;

    public function __construct(string $texto)
    {
        $limpio = trim($texto);

        if ($limpio === '') {
            throw ParametrosVaciosExcepcion::parametroVacio('funciones');
        }

        $this->texto = $limpio;
    }

    public function value(): string
    {
        return $this->texto;
    }
}