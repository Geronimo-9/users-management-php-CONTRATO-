<?php

declare(strict_types=1);

require_once __DIR__ . '/../ValueObjects/UserId.php';
require_once __DIR__ . '/../ValueObjects/contrato/Empresa.php';
require_once __DIR__ . '/../ValueObjects/contrato/Empleado.php';
require_once __DIR__ . '/../ValueObjects/contrato/Funciones.php';
require_once __DIR__ . '/../ValueObjects/contrato/Monto.php';
require_once __DIR__ . '/../ValueObjects/contrato/FechaFirma.php';
require_once __DIR__ . '/../ValueObjects/contrato/FechaInicio.php';
require_once __DIR__ . '/../ValueObjects/contrato/FechaFin.php';
require_once __DIR__ . '/../Enums/FrecuenciaPagoEnum.php';
require_once __DIR__ . '/../Enums/EstadoContratoEnum.php';
require_once __DIR__ . '/../Exceptions/FechaInvalidaExcepcion.php';

final class Contrato
{
    private ?string $id;
    private UserId $usuarioId;
    private Empresa $empresa;
    private Empleado $empleado;
    private Funciones $funciones;
    private Monto $monto;
    private string $frecuenciaPago;
    private FechaFirma $fechaFirma;
    private FechaInicio $fechaInicio;
    private FechaFin $fechaFin;
    private string $estado;

    public function __construct(
        ?string $id,
        UserId $usuarioId,
        Empresa $empresa,
        Empleado $empleado,
        Funciones $funciones,
        Monto $monto,
        string $frecuenciaPago,
        FechaFirma $fechaFirma,
        FechaInicio $fechaInicio,
        FechaFin $fechaFin,
        string $estado
    ) {
        FrecuenciaPagoEnum::ensureIsValid($frecuenciaPago);
        EstadoContratoEnum::ensureIsValid($estado);

        // Regla de negocio: el contrato no puede terminar antes de empezar
        if ($fechaFin->esAnteriorA($fechaInicio)) {
            throw FechaInvalidaExcepcion::fechaInconsistente();
        }

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

    public function id(): ?string { return $this->id; }
    public function usuarioId(): UserId { return $this->usuarioId; }
    public function empresa(): Empresa { return $this->empresa; }
    public function empleado(): Empleado { return $this->empleado; }
    public function funciones(): Funciones { return $this->funciones; }
    public function monto(): Monto { return $this->monto; }
    public function frecuenciaPago(): string { return $this->frecuenciaPago; }
    public function fechaFirma(): FechaFirma { return $this->fechaFirma; }
    public function fechaInicio(): FechaInicio { return $this->fechaInicio; }
    public function fechaFin(): FechaFin { return $this->fechaFin; }
    public function estado(): string { return $this->estado; }
}
