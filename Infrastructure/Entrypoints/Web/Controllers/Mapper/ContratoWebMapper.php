<?php

declare(strict_types=1);

require_once __DIR__ . '/../Dto/CreateContratoRequest.php';
require_once __DIR__ . '/../Dto/UpdateContratoRequest.php';
require_once __DIR__ . '/../Dto/ContratoResponse.php';

require_once __DIR__ . '/../../../../../Application/Services/Dto/Commands/CreateContratoCommand.php';
require_once __DIR__ . '/../../../../../Application/Services/Dto/Commands/UpdateContratoCommand.php';
require_once __DIR__ . '/../../../../../Application/Services/Dto/Commands/DeleteContratoCommand.php';
require_once __DIR__ . '/../../../../../Application/Services/Dto/Queries/GetContratoByIdQuery.php';

require_once __DIR__ . '/../../../../../Domain/Models/Contrato.php';

final class ContratoWebMapper
{
    public function fromCreateRequestToCommand(CreateContratoWebRequest $request): CreateContratoCommand
    {
        return new CreateContratoCommand(
            $request->getUsuarioId(),
            $request->getEmpresa(),
            $request->getEmpleado(),
            $request->getFunciones(),
            $request->getMonto(),
            $request->getFrecuenciaPago(),
            $request->getFechaFirma(),
            $request->getFechaInicio(),
            $request->getFechaFin()
        );
    }

    public function fromUpdateRequestToCommand(UpdateContratoWebRequest $request): UpdateContratoCommand
    {
        return new UpdateContratoCommand(
            $request->getId(),
            $request->getEmpresa(),
            $request->getEmpleado(),
            $request->getFunciones(),
            $request->getMonto(),
            $request->getFrecuenciaPago(),
            $request->getFechaFirma(),
            $request->getFechaInicio(),
            $request->getFechaFin(),
            $request->getEstado()
        );
    }

    public function fromIdToGetByIdQuery(string $id): GetContratoByIdQuery
    {
        return new GetContratoByIdQuery($id);
    }

    public function fromIdToDeleteCommand(string $id): DeleteContratoCommand
    {
        return new DeleteContratoCommand($id);
    }

    public function fromModelToResponse(Contrato $contrato): ContratoResponse
    {
        return new ContratoResponse(
            (string) ($contrato->id() ?? ''),
            $contrato->usuarioId()->value(),
            $contrato->empresa()->value(),
            $contrato->empleado()->value(),
            $contrato->funciones()->value(),
            $contrato->monto()->value(),
            $contrato->frecuenciaPago(),
            $contrato->fechaFirma()->toString(),
            $contrato->fechaInicio()->toString(),
            $contrato->fechaFin()->toString(),
            $contrato->estado()
        );
    }

    /**
     * @param Contrato[] $contratos
     * @return ContratoResponse[]
     */
    public function fromModelsToResponses(array $contratos): array
    {
        $responses = array();

        foreach ($contratos as $contrato) {
            $responses[] = $this->fromModelToResponse($contrato);
        }

        return $responses;
    }
}