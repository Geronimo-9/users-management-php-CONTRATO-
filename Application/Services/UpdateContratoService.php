<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/UpdateContratoUseCase.php';
require_once __DIR__ . '/../Ports/Out/UpdateContratoPort.php';
require_once __DIR__ . '/../Ports/Out/GetContratoByIdPort.php';
require_once __DIR__ . '/Mappers/ContratoApplicationMapper.php';

final class UpdateContratoService implements UpdateContratoUseCase
{
    private UpdateContratoPort $updateContratoPort;
    private GetContratoByIdPort $getContratoByIdPort;

    public function __construct(
        UpdateContratoPort $updateContratoPort,
        GetContratoByIdPort $getContratoByIdPort
    ) {
        $this->updateContratoPort = $updateContratoPort;
        $this->getContratoByIdPort = $getContratoByIdPort;
    }

    public function execute(UpdateContratoCommand $command): Contrato
    {
        $id = $command->getId();
        $currentContrato = $this->getContratoByIdPort->getById($id);

        if ($currentContrato === null) {
            throw new RuntimeException("El contrato con ID {$id} no fue encontrado.");
        }

        $contratoToUpdate = ContratoApplicationMapper::fromUpdateCommandToModel($command, $currentContrato);

        return $this->updateContratoPort->update($contratoToUpdate);
    }
}