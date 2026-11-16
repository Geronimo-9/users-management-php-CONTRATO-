<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/Contrato.php';

interface GetContratoByIdPort
{
    public function getById(string $id): ?Contrato;
}