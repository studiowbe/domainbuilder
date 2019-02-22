<?php

namespace Studiow\DomainBuilder\Behaviour;

use Studiow\DomainBuilder\Event\DomainEvent;
use Studiow\DomainBuilder\Event\DomainEvents;

trait RecordsEventsTrait
{
    private $events = [];

    public function recordEvent(DomainEvent $event): void
    {
        $this->events[] = $event;
    }

    /**
     * Get all events that occurred.
     *
     * @return DomainEvents
     */
    public function getRecordedEvents(): DomainEvents
    {
        return new DomainEvents($this->events);
    }

    /**
     * Clear all recorded events.
     */
    public function clearRecordedEvents(): void
    {
        $this->events = [];
    }
}
