<?php

declare(strict_types=1);

final class FechaInvalidaExcepcion extends DomainException
{
    private const PLAZOS_INCONSISTENTES = 'Los plazos presentan inconsistencias. La fecha de fin no puede ser anterior a la fecha de inicio.';
    private const FORMATO_FECHA = "La fecha '%s' del campo '%s' no tiene el formato AAAA-MM-DD o no existe.";

    private function __construct(string $message)
    {
        parent::__construct($message);
    }

    public static function fechaInconsistente(): self
    {
        return new self(self::PLAZOS_INCONSISTENTES);
    }

    public static function formatoFecha(string $campo, string $valor): self
    {
        return new self(sprintf(self::FORMATO_FECHA, $valor, $campo));
    }
}
