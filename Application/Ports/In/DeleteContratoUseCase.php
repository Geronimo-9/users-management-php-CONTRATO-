<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Services/Dto/Commands/DeleteContratoCommand.php';

interface DeleteContratoUseCase
{
    public function execute(DeleteContratoCommand $command): void;
}