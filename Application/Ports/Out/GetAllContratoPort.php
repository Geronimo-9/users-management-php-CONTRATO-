<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/Contrato.php';

interface GetAllContratoPort
{
    /**
     * @return Contrato[]
     */
    public function getAll(): array;
}