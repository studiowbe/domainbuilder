<?php

namespace Studiow\DomainBuilder\Event;

use Studiow\DomainBuilder\Aggregate\Identifier;

interface EventStore
{
    public function persist(EventCollection $events);

    public function getHistoryForId(Identifier $identifier): History;
}
