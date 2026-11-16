<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Services/Dto/Commands/UpdateContratoCommand.php';
require_once __DIR__ . '/../../../Domain/Models/Contrato.php';

interface UpdateContratoUseCase
{
    public function execute(UpdateContratoCommand $command): Contrato;
}