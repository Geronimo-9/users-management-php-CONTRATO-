<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/FormatoInvalidoExcepcion.php';

class EstadoContratoEnum
{
    const VIGENTE = 'VIGENTE';
    const VENCIDO = 'VENCIDO';

    public static function values(): array
    {
        return array(self::VIGENTE, self::VENCIDO);
    }

    public static function isValid(string $value): bool
    {
        return in_array($value, self::values(), true);
    }

    public static function ensureIsValid(string $value): void
    {
        if (!self::isValid($value)) {
            throw FormatoInvalidoExcepcion::valorNoPermitido('estado', $value);
        }
    }
}