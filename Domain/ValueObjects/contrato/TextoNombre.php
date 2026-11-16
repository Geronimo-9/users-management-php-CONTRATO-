<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Exceptions/ParametrosVaciosExcepcion.php';
require_once __DIR__ . '/../../Exceptions/FormatoInvalidoExcepcion.php';

abstract class TextoNombre
{
    private string $valor;

    protected function __construct(string $valor, string $campo)
    {
        $limpio = trim($valor);

        if ($limpio === '') {
            throw ParametrosVaciosExcepcion::parametroVacio($campo);
        }

        // Solo letras (con tildes y ñ) y espacios
        if (preg_match('/^[\p{L}][\p{L} ]*$/u', $limpio) !== 1) {
            throw FormatoInvalidoExcepcion::formatoIncorrecto($campo, $limpio);
        }

        $this->valor = $limpio;
    }

    public function value(): string
    {
        return $this->valor;
    }
}