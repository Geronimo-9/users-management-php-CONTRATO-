<?php

declare(strict_types=1);

/**
 * Datos para actualizar un contrato.
 * El usuario dueño del contrato no se edita: se conserva el del contrato guardado.
 */
final class UpdateContratoCommand
{
    private string $id;
    private string $empresa;
    private string $empleado;
    private string $funciones;
    private string $monto;
    private string $frecuenciaPago;
    private string $fechaFirma;
    private string $fechaInicio;
    private string $fechaFin;
    private string $estado;

    public function __construct(
        string $id,
        string $empresa,
        string $empleado,
        string $funciones,
        string $monto,
        string $frecuenciaPago,
        string $fechaFirma,
        string $fechaInicio,
        string $fechaFin,
        string $estado
    ) {
        $this->id = trim($id);
        $this->empresa = trim($empresa);
        $this->empleado = trim($empleado);
        $this->funciones = trim($funciones);
        $this->monto = trim($monto);
        $this->frecuenciaPago = trim($frecuenciaPago);
        $this->fechaFirma = trim($fechaFirma);
        $this->fechaInicio = trim($fechaInicio);
        $this->fechaFin = trim($fechaFin);
        $this->estado = trim($estado);
    }

    public function getId(): string
    {
        return $this->id;
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

    public function getEstado(): string
    {
        return $this->estado;
    }
}
