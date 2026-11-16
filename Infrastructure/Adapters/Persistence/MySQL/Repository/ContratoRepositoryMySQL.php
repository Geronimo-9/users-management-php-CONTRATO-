<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../../../Application/Ports/Out/SaveContratoPort.php';
require_once __DIR__ . '/../../../../../Application/Ports/Out/UpdateContratoPort.php';
require_once __DIR__ . '/../../../../../Application/Ports/Out/GetContratoByIdPort.php';
require_once __DIR__ . '/../../../../../Application/Ports/Out/GetAllContratoPort.php';
require_once __DIR__ . '/../../../../../Application/Ports/Out/DeleteContratoPort.php';

require_once __DIR__ . '/../Mapper/ContratoPersistenceMapper.php';
require_once __DIR__ . '/../../../../../Domain/Models/Contrato.php';

final class ContratoRepositoryMySQL implements
    SaveContratoPort,
    UpdateContratoPort,
    GetContratoByIdPort,
    GetAllContratoPort,
    DeleteContratoPort
{
    private PDO $pdo;
    private ContratoPersistenceMapper $mapper;

    public function __construct(PDO $pdo, ContratoPersistenceMapper $mapper)
    {
        $this->pdo = $pdo;
        $this->mapper = $mapper;
    }

    public function save(Contrato $contrato): Contrato
    {
        $dto = $this->mapper->fromModelToDto($contrato);

        $sql = '
            INSERT INTO contrato (
                fk_usuario,
                empresa,
                empleado,
                funciones,
                monto,
                frecuencia_pago,
                fecha_firma,
                fecha_inicio,
                fecha_fin,
                estado
            ) VALUES (
                :fk_usuario,
                :empresa,
                :empleado,
                :funciones,
                :monto,
                :frecuencia_pago,
                :fecha_firma,
                :fecha_inicio,
                :fecha_fin,
                :estado
            )
        ';

        $statement = $this->pdo->prepare($sql);
        $statement->execute(array(
            ':fk_usuario' => $dto->fkUsuario(),
            ':empresa' => $dto->empresa(),
            ':empleado' => $dto->empleado(),
            ':funciones' => $dto->funciones(),
            ':monto' => $dto->monto(),
            ':frecuencia_pago' => $dto->frecuenciaPago(),
            ':fecha_firma' => $dto->fechaFirma(),
            ':fecha_inicio' => $dto->fechaInicio(),
            ':fecha_fin' => $dto->fechaFin(),
            ':estado' => $dto->estado(),
        ));

        $newId = (string) $this->pdo->lastInsertId();
        $savedContrato = $this->getById($newId);

        if ($savedContrato === null) {
            throw new RuntimeException('El contrato no pudo recuperarse después de guardar.');
        }

        return $savedContrato;
    }

    public function update(Contrato $contrato): Contrato
    {
        $dto = $this->mapper->fromModelToDto($contrato);

        $sql = '
            UPDATE contrato
               SET fk_usuario = :fk_usuario,
                   empresa = :empresa,
                   empleado = :empleado,
                   funciones = :funciones,
                   monto = :monto,
                   frecuencia_pago = :frecuencia_pago,
                   fecha_firma = :fecha_firma,
                   fecha_inicio = :fecha_inicio,
                   fecha_fin = :fecha_fin,
                   estado = :estado
             WHERE id_contrato = :id_contrato
        ';

        $statement = $this->pdo->prepare($sql);
        $statement->execute(array(
            ':id_contrato' => $dto->idContrato(),
            ':fk_usuario' => $dto->fkUsuario(),
            ':empresa' => $dto->empresa(),
            ':empleado' => $dto->empleado(),
            ':funciones' => $dto->funciones(),
            ':monto' => $dto->monto(),
            ':frecuencia_pago' => $dto->frecuenciaPago(),
            ':fecha_firma' => $dto->fechaFirma(),
            ':fecha_inicio' => $dto->fechaInicio(),
            ':fecha_fin' => $dto->fechaFin(),
            ':estado' => $dto->estado(),
        ));

        $updatedContrato = $this->getById((string) $dto->idContrato());

        if ($updatedContrato === null) {
            throw new RuntimeException('El contrato no pudo recuperarse después de actualizar.');
        }

        return $updatedContrato;
    }

    public function getById(string $id): ?Contrato
    {
        if (!ctype_digit($id)) {
            return null;
        }

        $sql = '
            SELECT
                id_contrato,
                fk_usuario,
                empresa,
                empleado,
                funciones,
                monto,
                frecuencia_pago,
                fecha_firma,
                fecha_inicio,
                fecha_fin,
                estado
            FROM contrato
            WHERE id_contrato = :id_contrato
            LIMIT 1
        ';

        $statement = $this->pdo->prepare($sql);
        $statement->execute(array(
            ':id_contrato' => (int) $id,
        ));

        $row = $statement->fetch();

        if ($row === false) {
            return null;
        }

        return $this->mapper->fromRowToModel($row);
    }

    /**
     * @return Contrato[]
     */
    public function getAll(): array
    {
        $sql = '
            SELECT
                id_contrato,
                fk_usuario,
                empresa,
                empleado,
                funciones,
                monto,
                frecuencia_pago,
                fecha_firma,
                fecha_inicio,
                fecha_fin,
                estado
            FROM contrato
            ORDER BY id_contrato DESC
        ';

        $statement = $this->pdo->query($sql);
        $rows = $statement->fetchAll();

        return $this->mapper->fromRowsToModels($rows);
    }

    public function delete(string $id): void
    {
        if (!ctype_digit($id)) {
            return;
        }

        $sql = 'DELETE FROM contrato WHERE id_contrato = :id_contrato';

        $statement = $this->pdo->prepare($sql);
        $statement->execute(array(
            ':id_contrato' => (int) $id,
        ));
    }
}