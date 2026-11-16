<?php

declare(strict_types=1);

final class ContratoEntity
{
    private int $idContrato;
    private string $fkUsuario;
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
        int $idContrato,
        string $fkUsuario,
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
        $this->idContrato = $idContrato;
        $this->fkUsuario = trim($fkUsuario);
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

    public function idContrato(): int
    {
        return $this->idContrato;
    }

    public function fkUsuario(): string
    {
        return $this->fkUsuario;
    }

    public function empresa(): string
    {
        return $this->empresa;
    }

    public function empleado(): string
    {
        return $this->empleado;
    }

    public function funciones(): string
    {
        return $this->funciones;
    }

    public function monto(): string
    {
        return $this->monto;
    }

    public function frecuenciaPago(): string
    {
        return $this->frecuenciaPago;
    }

    public function fechaFirma(): string
    {
        return $this->fechaFirma;
    }

    public function fechaInicio(): string
    {
        return $this->fechaInicio;
    }

    public function fechaFin(): string
    {
        return $this->fechaFin;
    }

    public function estado(): string
    {
        return $this->estado;
    }
}