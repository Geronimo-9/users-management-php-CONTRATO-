<?php

declare(strict_types=1);

final class ParametrosVaciosExcepcion extends DomainException
{
    private const PARAMETRO_VACIO = "El parametro '%s' no puede quedar vacio.";

    private function __construct(string $message)
    {
        parent::__construct($message);
    }

    public static function parametroVacio(string $campo): self
    {
        return new self(sprintf(self::PARAMETRO_VACIO, $campo));
    }
}