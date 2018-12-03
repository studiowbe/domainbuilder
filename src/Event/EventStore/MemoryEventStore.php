<?php

namespace Studiow\DomainBuilder\Event\EventStore;

use Studiow\DomainBuilder\Aggregate\Identifier;
use Studiow\DomainBuilder\Event\Event;
use Studiow\DomainBuilder\Event\EventCollection;
use Studiow\DomainBuilder\Event\EventStore;
use Studiow\DomainBuilder\Event\History;

class MemoryEventStore implements EventStore
{
    private $events = [];

    public function persist(EventCollection $events)
    {
        foreach ($events as $event) {
            $this->events[] = $event;
        }
    }

    public function getHistoryForId(Identifier $identifier): History
    {
        return new History(
            $identifier,
            array_filter($this->events, function (Event $event) use ($identifier) {
                return $event->getIdentifier()->equals($identifier);
            })
        );
    }
}
