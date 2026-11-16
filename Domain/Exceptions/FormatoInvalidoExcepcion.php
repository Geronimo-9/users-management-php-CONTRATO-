<?php

declare(strict_types=1);

final class FormatoInvalidoExcepcion extends DomainException
{
    private const FORMATO_INCORRECTO = "El valor '%s' del campo '%s' tiene un formato invalido.";
    private const VALOR_NO_PERMITIDO = "El valor '%s' no es valido para el campo '%s'.";

    private function __construct(string $message)
    {
        parent::__construct($message);
    }

    public static function formatoIncorrecto(string $campo, string $valor): self
    {
        return new self(sprintf(self::FORMATO_INCORRECTO, $valor, $campo));
    }

    public static function valorNoPermitido(string $campo, string $valor): self
    {
        return new self(sprintf(self::VALOR_NO_PERMITIDO, $valor, $campo));
    }
}