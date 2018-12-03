<?php

namespace Studiow\DomainBuilder\Aggregate\Traits;

use Studiow\DomainBuilder\Event\Event;
use Studiow\DomainBuilder\Event\EventCollection;

trait KeepsEventsTrait
{
    private $events = [];

    protected function registerEvent(Event $event)
    {
        $this->events[] = $event;
    }

    /**
     * Get a list of all (unprocessed) events.
     *
     * @return EventCollection
     */
    public function getEvents(): EventCollection
    {
        return new EventCollection($this->events);
    }

    /**
     * Clear all events.
     */
    public function clearEvents(): void
    {
        $this->events = [];
    }
}
