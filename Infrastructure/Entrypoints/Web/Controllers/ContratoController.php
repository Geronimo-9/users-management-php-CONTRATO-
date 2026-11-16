<?php

declare(strict_types=1);

require_once __DIR__ . '/Mapper/ContratoWebMapper.php';

require_once __DIR__ . '/../../../../Application/Ports/In/CreateContratoUseCase.php';
require_once __DIR__ . '/../../../../Application/Ports/In/UpdateContratoUseCase.php';
require_once __DIR__ . '/../../../../Application/Ports/In/GetContratoByIdUseCase.php';
require_once __DIR__ . '/../../../../Application/Ports/In/GetAllContratoUseCase.php';
require_once __DIR__ . '/../../../../Application/Ports/In/DeleteContratoUseCase.php';

require_once __DIR__ . '/../../../../Application/Services/Dto/Queries/GetAllContratoQuery.php';

final class ContratoController
{
    private CreateContratoUseCase $createContratoUseCase;
    private UpdateContratoUseCase $updateContratoUseCase;
    private GetContratoByIdUseCase $getContratoByIdUseCase;
    private GetAllContratoUseCase $getAllContratoUseCase;
    private DeleteContratoUseCase $deleteContratoUseCase;
    private ContratoWebMapper $mapper;

    public function __construct(
        CreateContratoUseCase $createContratoUseCase,
        UpdateContratoUseCase $updateContratoUseCase,
        GetContratoByIdUseCase $getContratoByIdUseCase,
        GetAllContratoUseCase $getAllContratoUseCase,
        DeleteContratoUseCase $deleteContratoUseCase,
        ContratoWebMapper $mapper
    ) {
        $this->createContratoUseCase = $createContratoUseCase;
        $this->updateContratoUseCase = $updateContratoUseCase;
        $this->getContratoByIdUseCase = $getContratoByIdUseCase;
        $this->getAllContratoUseCase = $getAllContratoUseCase;
        $this->deleteContratoUseCase = $deleteContratoUseCase;
        $this->mapper = $mapper;
    }

    /**
     * @return ContratoResponse[]
     */
    public function index(): array
    {
        $contratos = $this->getAllContratoUseCase->execute(new GetAllContratoQuery());

        return $this->mapper->fromModelsToResponses($contratos);
    }

    public function show(string $id): ContratoResponse
    {
        $query = $this->mapper->fromIdToGetByIdQuery($id);
        $contrato = $this->getContratoByIdUseCase->execute($query);

        return $this->mapper->fromModelToResponse($contrato);
    }

    public function store(CreateContratoWebRequest $request): ContratoResponse
    {
        $command = $this->mapper->fromCreateRequestToCommand($request);
        $contrato = $this->createContratoUseCase->execute($command);

        return $this->mapper->fromModelToResponse($contrato);
    }

    public function update(UpdateContratoWebRequest $request): ContratoResponse
    {
        $command = $this->mapper->fromUpdateRequestToCommand($request);
        $contrato = $this->updateContratoUseCase->execute($command);

        return $this->mapper->fromModelToResponse($contrato);
    }

    public function delete(string $id): void
    {
        $command = $this->mapper->fromIdToDeleteCommand($id);
        $this->deleteContratoUseCase->execute($command);
    }
}