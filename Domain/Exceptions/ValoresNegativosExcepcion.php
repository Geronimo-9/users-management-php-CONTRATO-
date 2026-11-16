<?php

declare(strict_types=1);

final class ValoresNegativosExcepcion extends DomainException
{
    private const VALORES_NEGATIVOS = "El campo '%s' no puede ser negativo (recibido: %s).";

    private function __construct(string $message)
    {
        parent::__construct($message);
    }

    public static function valorNegativo(string $campo, string $valor): self
    {
        return new self(sprintf(self::VALORES_NEGATIVOS, $campo, $valor));
    }
}