<?php

namespace Studiow\DomainBuilder;

use Studiow\DomainBuilder\Behaviour\HasIdentifierTrait;
use Studiow\DomainBuilder\Behaviour\IsEventSourcedTrait;
use Studiow\DomainBuilder\Identity\Identifier;

abstract class AggregateBase implements Aggregate
{
    use HasIdentifierTrait, IsEventSourcedTrait;

    protected function __construct(Identifier $id)
    {
        $this->setIdentifier($id);
    }

    protected static function createEmpty(Identifier $id)
    {
        return new static($id);
    }
}
