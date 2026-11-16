<?php

require_once __DIR__ . '/EventDomain.php';

class ContratoDeletedDomainEvent extends DomainEvent
{
    private $contratoId;

    public function __construct(string $contratoId)
    {
        parent::__construct('contrato.deleted');
        $this->contratoId = $contratoId;
    }

    public function contratoId()
    {
        return $this->contratoId;
    }

    public function payload()
    {
        return array(
            'id' => $this->contratoId
        );
    }
}