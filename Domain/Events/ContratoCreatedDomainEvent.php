<?php

require_once __DIR__ . '/EventDomain.php';
require_once __DIR__ . '/../Models/Contrato.php';

class ContratoCreatedDomainEvent extends DomainEvent
{
    private $contrato;

    public function __construct(Contrato $contrato)
    {
        parent::__construct('contrato.created');
        $this->contrato = $contrato;
    }

    public function contrato()
    {
        return $this->contrato;
    }

    public function payload()
    {
        return array(
            'id' => $this->contrato->id(),
            'usuario_id' => $this->contrato->usuarioId()->value(),
            'empresa' => $this->contrato->empresa()->value(),
            'empleado' => $this->contrato->empleado()->value(),
            'funciones' => $this->contrato->funciones()->value(),
            'monto' => $this->contrato->monto()->value(),
            'frecuencia_pago' => $this->contrato->frecuenciaPago(),
            'fecha_firma' => $this->contrato->fechaFirma()->value()->format('Y-m-d'),
            'fecha_inicio' => $this->contrato->fechaInicio()->value()->format('Y-m-d'),
            'fecha_fin' => $this->contrato->fechaFin()->value()->format('Y-m-d'),
            'estado' => $this->contrato->estado()
        );
    }
}