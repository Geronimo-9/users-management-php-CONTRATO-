<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/Contrato.php';

interface UpdateContratoPort
{
    public function update(Contrato $contrato): Contrato;
}