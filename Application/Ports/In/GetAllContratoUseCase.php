<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Services/Dto/Queries/GetAllContratoQuery.php';
require_once __DIR__ . '/../../../Domain/Models/Contrato.php';

interface GetAllContratoUseCase
{
    /**
     * @return Contrato[]
     */
    public function execute(GetAllContratoQuery $query): array;
}