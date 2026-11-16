<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/DeleteContratoUseCase.php';
require_once __DIR__ . '/../Ports/Out/DeleteContratoPort.php';
require_once __DIR__ . '/../Ports/Out/GetContratoByIdPort.php';
require_once __DIR__ . '/Mappers/ContratoApplicationMapper.php';

final class DeleteContratoService implements DeleteContratoUseCase
{
    private DeleteContratoPort $deleteContratoPort;
    private GetContratoByIdPort $getContratoByIdPort;

    public function __construct(
        DeleteContratoPort $deleteContratoPort,
        GetContratoByIdPort $getContratoByIdPort
    ) {
        $this->deleteContratoPort = $deleteContratoPort;
        $this->getContratoByIdPort = $getContratoByIdPort;
    }

    public function execute(DeleteContratoCommand $command): void
    {
        $id = ContratoApplicationMapper::fromDeleteCommandToString($command);
        $existingContrato = $this->getContratoByIdPort->getById($id);

        if ($existingContrato === null) {
            throw new RuntimeException("El contrato con ID {$id} no fue encontrado.");
        }

        $this->deleteContratoPort->delete($id);
    }
}