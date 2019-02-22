<?php

namespace Studiow\DomainBuilder\Event;

use Studiow\DomainBuilder\Behaviour\HasIdentifierTrait;
use Studiow\DomainBuilder\Identity\HasIdentifier;
use Studiow\DomainBuilder\Identity\Identifier;

class History extends DomainEvents implements HasIdentifier
{
    use HasIdentifierTrait;

    public function __construct(Identifier $identifier, array $events = [])
    {
        parent::__construct($events);
        $this->setIdentifier($identifier);
    }
}
