<?php

namespace Studiow\DomainBuilder\Behaviour;

use LogicException;
use Studiow\DomainBuilder\Identity\Identifier;

trait HasIdentifierTrait
{
    private $identifier;

    private function setIdentifier(Identifier $identifier)
    {
        $this->identifier = $identifier;
    }

    public function getIdentifier(): Identifier
    {
        if (is_null($this->identifier)) {
            throw new LogicException('Identifier was not set');
        }

        return $this->identifier;
    }
}
