<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Services/Dto/Queries/GetContratoByIdQuery.php';
require_once __DIR__ . '/../../../Domain/Models/Contrato.php';

interface GetContratoByIdUseCase
{
    public function execute(GetContratoByIdQuery $query): Contrato;
}