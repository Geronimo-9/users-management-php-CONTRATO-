<?php

declare(strict_types=1);

final class ClassLoader
{
    /**
     * @var array<string, string>
     */
    private static array $classMap = array(
        'InvalidUserEmailException' => 'Domain/Exceptions/InvalidUserEmailException.php',
        'InvalidUserIdException' => 'Domain/Exceptions/InvalidUserIdException.php',
        'InvalidUserNameException' => 'Domain/Exceptions/InvalidUserNameException.php',
        'InvalidUserPasswordException' => 'Domain/Exceptions/InvalidUserPasswordException.php',
        'InvalidUserRoleException' => 'Domain/Exceptions/InvalidUserRoleException.php',
        'InvalidUserStatusException' => 'Domain/Exceptions/InvalidUserStatusException.php',
        'UserAlreadyExistsException' => 'Domain/Exceptions/UserAlreadyExistsException.php',
        'UserNotFoundException' => 'Domain/Exceptions/UserNotFoundException.php',
        'InvalidCredentialsException' => 'Domain/Exceptions/InvalidCredentialsException.php',

        'UserRoleEnum' => 'Domain/Enums/UserRoleEnum.php',
        'UserStatusEnum' => 'Domain/Enums/UserStatusEnum.php',

        'UserId' => 'Domain/ValueObjects/UserId.php',
        'UserName' => 'Domain/ValueObjects/UserName.php',
        'UserEmail' => 'Domain/ValueObjects/UserEmail.php',
        'UserPassword' => 'Domain/ValueObjects/UserPassword.php',

        'UserModel' => 'Domain/Models/UserModel.php',
        'EmailDestinationModel' => 'Domain/Models/EmailDestinationModel.php',
        'EmailSenderException' => 'Domain/Exceptions/EmailSenderException.php',
        'EmailSenderPort' => 'Application/Ports/Out/EmailSenderPort.php',
        'EmailNotificationService' => 'Application/Services/EmailNotificationService.php',
        'EmailSenderService' => 'Infrastructure/Adapters/Email/EmailSenderService.php',

        'CreateUserUseCase' => 'Application/Ports/In/CreateUserUseCase.php',
        'UpdateUserUseCase' => 'Application/Ports/In/UpdateUserUseCase.php',
        'GetUserByIdUseCase' => 'Application/Ports/In/GetUserByIdUseCase.php',
        'GetAllUsersUseCase' => 'Application/Ports/In/GetAllUsersUseCase.php',
        'DeleteUserUseCase' => 'Application/Ports/In/DeleteUserUseCase.php',
        'LoginUseCase' => 'Application/Ports/In/LoginUseCase.php',

        'SaveUserPort' => 'Application/Ports/Out/SaveUserPort.php',
        'UpdateUserPort' => 'Application/Ports/Out/UpdateUserPort.php',
        'GetUserByIdPort' => 'Application/Ports/Out/GetUserByIdPort.php',
        'GetUserByEmailPort' => 'Application/Ports/Out/GetUserByEmailPort.php',
        'GetAllUsersPort' => 'Application/Ports/Out/GetAllUsersPort.php',
        'DeleteUserPort' => 'Application/Ports/Out/DeleteUserPort.php',

        'CreateUserCommand' => 'Application/Services/Dto/Commands/CreateUserCommand.php',
        'UpdateUserCommand' => 'Application/Services/Dto/Commands/UpdateUserCommand.php',
        'DeleteUserCommand' => 'Application/Services/Dto/Commands/DeleteUserCommand.php',
        'LoginCommand' => 'Application/Services/Dto/Commands/LoginCommand.php',
        'GetUserByIdQuery' => 'Application/Services/Dto/Queries/GetUserByIdQuery.php',
        'GetAllUsersQuery' => 'Application/Services/Dto/Queries/GetAllUsersQuery.php',

        'CreateUserService' => 'Application/Services/CreateUserService.php',
        'UpdateUserService' => 'Application/Services/UpdateUserService.php',
        'GetUserByIdService' => 'Application/Services/GetUserByIdService.php',
        'GetAllUsersService' => 'Application/Services/GetAllUsersService.php',
        'DeleteUserService' => 'Application/Services/DeleteUserService.php',
        'LoginService' => 'Application/Services/LoginService.php',
        'UserApplicationMapper' => 'Application/Services/Mappers/UserApplicationMapper.php',

        'Connection' => 'Infrastructure/Adapters/Persistence/MySQL/Config/Connection.php',
        'UserPersistenceDto' => 'Infrastructure/Adapters/Persistence/MySQL/Dto/UserPersistenceDto.php',
        'UserEntity' => 'Infrastructure/Adapters/Persistence/MySQL/Entity/UserEntity.php',
        'UserPersistenceMapper' => 'Infrastructure/Adapters/Persistence/MySQL/Mapper/UserPersistenceMapper.php',
        'UserRepositoryMySQL' => 'Infrastructure/Adapters/Persistence/MySQL/Repository/UserRepositoryMySQL.php',

        'CreateUserWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/CreateUserRequest.php',
        'UpdateUserWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/UpdateUserRequest.php',
        'LoginWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/LoginWebRequest.php',
        'UserResponse' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/UserResponse.php',
        'UserWebMapper' => 'Infrastructure/Entrypoints/Web/Controllers/Mapper/UserWebMapper.php',
        'UserController' => 'Infrastructure/Entrypoints/Web/Controllers/UserController.php',
        'WebRoutes' => 'Infrastructure/Entrypoints/Web/Controllers/Config/WebRoutes.php',

        'View' => 'Infrastructure/Entrypoints/Web/Presentation/View.php',
        'Flash' => 'Infrastructure/Entrypoints/Web/Presentation/Flash.php',

        'DependencyInjection' => 'Common/DependencyInjection.php',


// Excepciones y Enums de Contrato
        'FechaInvalidaExcepcion' => 'Domain/Exceptions/FechaInvalidaExcepcion.php',
        'FormatoInvalidoExcepcion' => 'Domain/Exceptions/FormatoInvalidoExcepcion.php',
        'ParametrosVaciosExcepcion' => 'Domain/Exceptions/ParametrosVaciosExcepcion.php',
        'ValoresNegativosExcepcion' => 'Domain/Exceptions/ValoresNegativosExcepcion.php',
        'EstadoContratoEnum' => 'Domain/Enums/EstadoContratoEnum.php',
        'FrecuenciaPagoEnum' => 'Domain/Enums/FrecuenciaPagoEnum.php',

        // Value Objects, Modelo y Eventos de Contrato
        'TextoNombre' => 'Domain/ValueObjects/contrato/TextoNombre.php',
        'Empresa' => 'Domain/ValueObjects/contrato/Empresa.php',
        'Empleado' => 'Domain/ValueObjects/contrato/Empleado.php',
        'Funciones' => 'Domain/ValueObjects/contrato/Funciones.php',
        'Monto' => 'Domain/ValueObjects/contrato/Monto.php',
        'FechaContrato' => 'Domain/ValueObjects/contrato/FechaContrato.php',
        'FechaFirma' => 'Domain/ValueObjects/contrato/FechaFirma.php',
        'FechaInicio' => 'Domain/ValueObjects/contrato/FechaInicio.php',
        'FechaFin' => 'Domain/ValueObjects/contrato/FechaFin.php',
        'Contrato' => 'Domain/Models/Contrato.php',
        'ContratoCreatedDomainEvent' => 'Domain/Events/ContratoCreatedDomainEvent.php',
        'ContratoUpdatedDomainEvent' => 'Domain/Events/ContratoUpdatedDomainEvent.php',
        'ContratoDeletedDomainEvent' => 'Domain/Events/ContratoDeletedDomainEvent.php',

        // Application Ports, DTOs, Services y Mapper de Contrato
        'CreateContratoUseCase' => 'Application/Ports/In/CreateContratoUseCase.php',
        'UpdateContratoUseCase' => 'Application/Ports/In/UpdateContratoUseCase.php',
        'GetContratoByIdUseCase' => 'Application/Ports/In/GetContratoByIdUseCase.php',
        'GetAllContratoUseCase' => 'Application/Ports/In/GetAllContratoUseCase.php',
        'DeleteContratoUseCase' => 'Application/Ports/In/DeleteContratoUseCase.php',

        'SaveContratoPort' => 'Application/Ports/Out/SaveContratoPort.php',
        'UpdateContratoPort' => 'Application/Ports/Out/UpdateContratoPort.php',
        'GetContratoByIdPort' => 'Application/Ports/Out/GetContratoByIdPort.php',
        'GetAllContratoPort' => 'Application/Ports/Out/GetAllContratoPort.php',
        'DeleteContratoPort' => 'Application/Ports/Out/DeleteContratoPort.php',

        'CreateContratoCommand' => 'Application/Services/Dto/Commands/CreateContratoCommand.php',
        'UpdateContratoCommand' => 'Application/Services/Dto/Commands/UpdateContratoCommand.php',
        'DeleteContratoCommand' => 'Application/Services/Dto/Commands/DeleteContratoCommand.php',
        'GetContratoByIdQuery' => 'Application/Services/Dto/Queries/GetContratoByIdQuery.php',
        'GetAllContratoQuery' => 'Application/Services/Dto/Queries/GetAllContratoQuery.php',

        'CreateContratoService' => 'Application/Services/CreateContratoService.php',
        'UpdateContratoService' => 'Application/Services/UpdateContratoService.php',
        'GetContratoByIdService' => 'Application/Services/GetContratoByIdService.php',
        'GetAllContratoService' => 'Application/Services/GetAllContratoService.php',
        'DeleteContratoService' => 'Application/Services/DeleteContratoService.php',
        'ContratoApplicationMapper' => 'Application/Services/Mappers/ContratoApplicationMapper.php',

        // Infrastructure Persistence & Web de Contrato
        'ContratoPersistenceDto' => 'Infrastructure/Adapters/Persistence/MySQL/Dto/ContratoPersistenceDto.php',
        'ContratoEntity' => 'Infrastructure/Adapters/Persistence/MySQL/Entity/ContratoEntity.php',
        'ContratoPersistenceMapper' => 'Infrastructure/Adapters/Persistence/MySQL/Mapper/ContratoPersistenceMapper.php',
        'ContratoRepositoryMySQL' => 'Infrastructure/Adapters/Persistence/MySQL/Repository/ContratoRepositoryMySQL.php',

        'CreateContratoWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/CreateContratoRequest.php',
        'UpdateContratoWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/UpdateContratoRequest.php',
        'ContratoResponse' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/ContratoResponse.php',
        'ContratoWebMapper' => 'Infrastructure/Entrypoints/Web/Controllers/Mapper/ContratoWebMapper.php',
        'ContratoController' => 'Infrastructure/Entrypoints/Web/Controllers/ContratoController.php',


    );

    public static function register(): void
    {
        spl_autoload_register(array(self::class, 'loadClass'));
    }

    public static function loadClass(string $className): void
    {
        if (!isset(self::$classMap[$className])) {
            return;
        }

        $baseDir = dirname(__DIR__) . DIRECTORY_SEPARATOR;
        $filePath = $baseDir . self::$classMap[$className];

        if (!file_exists($filePath)) {
            throw new RuntimeException(
                sprintf('No se encontró el archivo para la clase %s en %s', $className, $filePath)
            );
        }

        require_once $filePath;
    }
}