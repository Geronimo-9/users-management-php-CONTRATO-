<?php

declare(strict_types=1);

final class ContratoResponse
{
    private string $id;
    private string $usuarioId;
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
        string $usuarioId,
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
        $this->id = $id;
        $this->usuarioId = $usuarioId;
        $this->empresa = $empresa;
        $this->empleado = $empleado;
        $this->funciones = $funciones;
        $this->monto = $monto;
        $this->frecuenciaPago = $frecuenciaPago;
        $this->fechaFirma = $fechaFirma;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
        $this->estado = $estado;
    }

    public function getId(): string
    {
        return $this->id;
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

    public function getEstado(): string
    {
        return $this->estado;
    }

    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        return array(
            'id' => $this->id,
            'usuario_id' => $this->usuarioId,
            'empresa' => $this->empresa,
            'empleado' => $this->empleado,
            'funciones' => $this->funciones,
            'monto' => $this->monto,
            'frecuencia_pago' => $this->frecuenciaPago,
            'fecha_firma' => $this->fechaFirma,
            'fecha_inicio' => $this->fechaInicio,
            'fecha_fin' => $this->fechaFin,
            'estado' => $this->estado,
        );
    }
}