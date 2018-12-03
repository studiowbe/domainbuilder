<?php

namespace Studiow\DomainBuilder\Aggregate;

interface AggregateRepository
{
    public function persist(KeepsEvents $aggregate);

    public function fromIdentifier(Identifier $identifier);
}
