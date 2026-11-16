<?php

declare(strict_types=1);

require_once __DIR__ . '/../Dto/Commands/CreateContratoCommand.php';
require_once __DIR__ . '/../Dto/Commands/UpdateContratoCommand.php';
require_once __DIR__ . '/../Dto/Commands/DeleteContratoCommand.php';
require_once __DIR__ . '/../Dto/Queries/GetContratoByIdQuery.php';

require_once __DIR__ . '/../../../Domain/Models/Contrato.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/UserId.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/contrato/Empresa.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/contrato/Empleado.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/contrato/Funciones.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/contrato/Monto.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/contrato/FechaFirma.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/contrato/FechaInicio.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/contrato/FechaFin.php';
require_once __DIR__ . '/../../../Domain/Enums/EstadoContratoEnum.php';

final class ContratoApplicationMapper
{
    /**
     * Mapea el comando de creación hacia el modelo de dominio Contrato.
     */
    public static function fromCreateCommandToModel(CreateContratoCommand $command): Contrato
    {
        $fechaFin = FechaFin::fromString($command->getFechaFin());

        return new Contrato(
            null,
            new UserId($command->getUsuarioId()),
            new Empresa($command->getEmpresa()),
            new Empleado($command->getEmpleado()),
            new Funciones($command->getFunciones()),
            new Monto($command->getMonto()),
            $command->getFrecuenciaPago(),
            FechaFirma::fromString($command->getFechaFirma()),
            FechaInicio::fromString($command->getFechaInicio()),
            $fechaFin,
            self::estadoSegunFechaFin($fechaFin)
        );
    }

    /**
     * Mapea el comando de actualización conservando el usuario original del contrato actual.
     */
    public static function fromUpdateCommandToModel(UpdateContratoCommand $command, Contrato $actual): Contrato
    {
        return new Contrato(
            $command->getId(),
            $actual->usuarioId(), // Se conserva el UserId original
            new Empresa($command->getEmpresa()),
            new Empleado($command->getEmpleado()),
            new Funciones($command->getFunciones()),
            new Monto($command->getMonto()),
            $command->getFrecuenciaPago(),
            FechaFirma::fromString($command->getFechaFirma()),
            FechaInicio::fromString($command->getFechaInicio()),
            FechaFin::fromString($command->getFechaFin()),
            $command->getEstado()
        );
    }

    public static function fromGetContratoByIdQueryToString(GetContratoByIdQuery $query): string
    {
        return $query->getId();
    }

    public static function fromDeleteCommandToString(DeleteContratoCommand $command): string
    {
        return $command->getId();
    }

    /**
     * Transforma un modelo Contrato a un arreglo plano (ideal para respuestas o vistas).
     * @return array<string, mixed>
     */
    public static function fromModelToArray(Contrato $contrato): array
    {
        return array(
            'id' => $contrato->id(),
            'usuario_id' => $contrato->usuarioId()->value(),
            'empresa' => $contrato->empresa()->value(),
            'empleado' => $contrato->empleado()->value(),
            'funciones' => $contrato->funciones()->value(),
            'monto' => $contrato->monto()->value(),
            'frecuencia_pago' => $contrato->frecuenciaPago(),
            'fecha_firma' => $contrato->fechaFirma()->toString(),
            'fecha_inicio' => $contrato->fechaInicio()->toString(),
            'fecha_fin' => $contrato->fechaFin()->toString(),
            'estado' => $contrato->estado()
        );
    }

    /**
     * @param Contrato[] $contratos
     * @return array<int, array<string, mixed>>
     */
    public static function fromModelsToArray(array $contratos): array
    {
        $result = array();

        foreach ($contratos as $contrato) {
            $result[] = self::fromModelToArray($contrato);
        }

        return $result;
    }

   /**
     * Calcula automáticamente el estado según la fecha de fin.
     */
    private static function estadoSegunFechaFin(FechaFin $fechaFin): string
    {
        $hoy = new DateTimeImmutable('today');

        return $fechaFin->value() < $hoy
            ? EstadoContratoEnum::VENCIDO
            : EstadoContratoEnum::VIGENTE;
    }
    
    }