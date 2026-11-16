<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/FormatoInvalidoExcepcion.php';

class FrecuenciaPagoEnum
{
    const SEMANAL = 'SEMANAL';
    const QUINCENAL = 'QUINCENAL';
    const MENSUAL = 'MENSUAL';
    const SEMESTRAL = 'SEMESTRAL';
    const ANUAL = 'ANUAL';

    public static function values(): array
    {
        return array(
            self::SEMANAL,
            self::QUINCENAL,
            self::MENSUAL,
            self::SEMESTRAL,
            self::ANUAL
        );
    }

    public static function isValid(string $value): bool
    {
        return in_array($value, self::values(), true);
    }

    public static function ensureIsValid(string $value): void
    {
        if (!self::isValid($value)) {
            throw FormatoInvalidoExcepcion::valorNoPermitido('frecuencia de pago', $value);
        }
    }
}