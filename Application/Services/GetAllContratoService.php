<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/GetAllContratoUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetAllContratoPort.php';

final class GetAllContratoService implements GetAllContratoUseCase
{
    private GetAllContratoPort $getAllContratoPort;

    public function __construct(GetAllContratoPort $getAllContratoPort)
    {
        $this->getAllContratoPort = $getAllContratoPort;
    }

    /**
     * @return Contrato[]
     */
    public function execute(GetAllContratoQuery $query): array
    {
        return $this->getAllContratoPort->getAll();
    }
}