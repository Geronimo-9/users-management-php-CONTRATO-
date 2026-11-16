<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Exceptions/FechaInvalidaExcepcion.php';

/**
 * Base de las fechas del contrato (FechaInicio, FechaFin y FechaFirma).
 */
abstract class FechaContrato
{
    private DateTimeImmutable $fecha;

    public function __construct(DateTimeImmutable $fecha)
    {
        $this->fecha = $fecha;
    }

    public static function fromString(string $texto): static
    {
        $fecha = DateTimeImmutable::createFromFormat('!Y-m-d', trim($texto));
        $errores = DateTimeImmutable::getLastErrors();

        $hayErrores = $errores !== false
            && ($errores['warning_count'] > 0 || $errores['error_count'] > 0);

        if ($fecha === false || $hayErrores) {
            throw FechaInvalidaExcepcion::formatoFecha(static::class, $texto);
        }

        return new static($fecha);
    }

    public function value(): DateTimeImmutable
    {
        return $this->fecha;
    }

    public function toString(): string
    {
        return $this->fecha->format('Y-m-d');
    }

    public function esAnteriorA(FechaContrato $otra): bool
    {
        return $this->fecha < $otra->fecha;
    }
}
