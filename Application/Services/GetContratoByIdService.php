<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/GetContratoByIdUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetContratoByIdPort.php';
require_once __DIR__ . '/Mappers/ContratoApplicationMapper.php';

final class GetContratoByIdService implements GetContratoByIdUseCase
{
    private GetContratoByIdPort $getContratoByIdPort;

    public function __construct(GetContratoByIdPort $getContratoByIdPort)
    {
        $this->getContratoByIdPort = $getContratoByIdPort;
    }

    public function execute(GetContratoByIdQuery $query): Contrato
    {
        $id = ContratoApplicationMapper::fromGetContratoByIdQueryToString($query);
        $contrato = $this->getContratoByIdPort->getById($id);

        if ($contrato === null) {
            throw new RuntimeException("El contrato con ID {$id} no fue encontrado.");
        }

        return $contrato;
    }
}