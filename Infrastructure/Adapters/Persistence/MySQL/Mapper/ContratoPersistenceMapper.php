<?php

declare(strict_types=1);

require_once __DIR__ . '/../Dto/ContratoPersistenceDto.php';
require_once __DIR__ . '/../Entity/ContratoEntity.php';

require_once __DIR__ . '/../../../../../Domain/Models/Contrato.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/UserId.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/contrato/Empresa.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/contrato/Empleado.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/contrato/Funciones.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/contrato/Monto.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/contrato/FechaFirma.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/contrato/FechaInicio.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/contrato/FechaFin.php';

final class ContratoPersistenceMapper
{
    public function fromModelToDto(Contrato $contrato): ContratoPersistenceDto
    {
        $id = $contrato->id();
        $idContrato = ($id !== null && trim($id) !== '') ? (int) $id : null;

        return new ContratoPersistenceDto(
            $idContrato,
            $contrato->usuarioId()->value(),
            $contrato->empresa()->value(),
            $contrato->empleado()->value(),
            $contrato->funciones()->value(),
            $contrato->monto()->value(),
            $contrato->frecuenciaPago(),
            $contrato->fechaFirma()->toString(),
            $contrato->fechaInicio()->toString(),
            $contrato->fechaFin()->toString(),
            $contrato->estado()
        );
    }

    public function fromDtoToEntity(ContratoPersistenceDto $dto): ContratoEntity
    {
        return new ContratoEntity(
            $dto->idContrato() ?? 0,
            $dto->fkUsuario(),
            $dto->empresa(),
            $dto->empleado(),
            $dto->funciones(),
            $dto->monto(),
            $dto->frecuenciaPago(),
            $dto->fechaFirma(),
            $dto->fechaInicio(),
            $dto->fechaFin(),
            $dto->estado()
        );
    }

    public function fromRowToEntity(array $row): ContratoEntity
    {
        return new ContratoEntity(
            (int) $row['id_contrato'],
            (string) $row['fk_usuario'],
            (string) $row['empresa'],
            (string) $row['empleado'],
            (string) $row['funciones'],
            (string) $row['monto'],
            (string) $row['frecuencia_pago'],
            (string) $row['fecha_firma'],
            (string) $row['fecha_inicio'],
            (string) $row['fecha_fin'],
            (string) $row['estado']
        );
    }

    public function fromEntityToModel(ContratoEntity $entity): Contrato
    {
        return new Contrato(
            (string) $entity->idContrato(),
            new UserId($entity->fkUsuario()),
            new Empresa($entity->empresa()),
            new Empleado($entity->empleado()),
            new Funciones($entity->funciones()),
            new Monto($entity->monto()),
            $entity->frecuenciaPago(),
            FechaFirma::fromString($entity->fechaFirma()),
            FechaInicio::fromString($entity->fechaInicio()),
            FechaFin::fromString($entity->fechaFin()),
            $entity->estado()
        );
    }

    public function fromRowToModel(array $row): Contrato
    {
        return $this->fromEntityToModel(
            $this->fromRowToEntity($row)
        );
    }

    /**
     * @param array<int, array<string, mixed>> $rows
     * @return Contrato[]
     */
    public function fromRowsToModels(array $rows): array
    {
        $models = array();

        foreach ($rows as $row) {
            $models[] = $this->fromRowToModel($row);
        }

        return $models;
    }
}