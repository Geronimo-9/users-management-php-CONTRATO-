<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/Contrato.php';

interface DeleteContratoPort
{
    public function delete(string $id): void;
}