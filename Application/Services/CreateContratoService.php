<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/CreateContratoUseCase.php';
require_once __DIR__ . '/../Ports/Out/SaveContratoPort.php';
require_once __DIR__ . '/Mappers/ContratoApplicationMapper.php';

final class CreateContratoService implements CreateContratoUseCase
{
    private SaveContratoPort $saveContratoPort;

    public function __construct(SaveContratoPort $saveContratoPort)
    {
        $this->saveContratoPort = $saveContratoPort;
    }

    public function execute(CreateContratoCommand $command): Contrato
    {
        // El dominio valida cada dato al construir el contrato.
        $contrato = ContratoApplicationMapper::fromCreateCommandToModel($command);

        // El adaptador devuelve el contrato ya con el id generado por la base de datos.
        return $this->saveContratoPort->save($contrato);
    }
}
