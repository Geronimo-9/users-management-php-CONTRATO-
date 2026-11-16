<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Services/Dto/Commands/CreateContratoCommand.php';
require_once __DIR__ . '/../../../Domain/Models/Contrato.php';

interface CreateContratoUseCase
{
    public function execute(CreateContratoCommand $command): Contrato;
}