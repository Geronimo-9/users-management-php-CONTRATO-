<?php

declare(strict_types=1);

final class CreateContratoCommand
{
    private string $usuarioId;
    private string $empresa;
    private string $empleado;
    private string $funciones;
    private string $monto;
    private string $frecuenciaPago;
    private string $fechaFirma;
    private string $fechaInicio;
    private string $fechaFin;

    public function __construct(
        string $usuarioId,
        string $empresa,
        string $empleado,
        string $funciones,
        string $monto,
        string $frecuenciaPago,
        string $fechaFirma,
        string $fechaInicio,
        string $fechaFin
    ) {
        $this->usuarioId = trim($usuarioId);
        $this->empresa = trim($empresa);
        $this->empleado = trim($empleado);
        $this->funciones = trim($funciones);
        $this->monto = trim($monto);
        $this->frecuenciaPago = trim($frecuenciaPago);
        $this->fechaFirma = trim($fechaFirma);
        $this->fechaInicio = trim($fechaInicio);
        $this->fechaFin = trim($fechaFin);
    }

    public function getUsuarioId(): string
    {
        return $this->usuarioId;
    }

    public function getEmpresa(): string
    {
        return $this->empresa;
    }

    public function getEmpleado(): string
    {
        return $this->empleado;
    }

    public function getFunciones(): string
    {
        return $this->funciones;
    }

    public function getMonto(): string
    {
        return $this->monto;
    }

    public function getFrecuenciaPago(): string
    {
        return $this->frecuenciaPago;
    }

    public function getFechaFirma(): string
    {
        return $this->fechaFirma;
    }

    public function getFechaInicio(): string
    {
        return $this->fechaInicio;
    }

    public function getFechaFin(): string
    {
        return $this->fechaFin;
    }
}
