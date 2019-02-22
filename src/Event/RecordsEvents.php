<?php

namespace Studiow\DomainBuilder\Event;

interface RecordsEvents
{
    /**
     * Get all events that occurred.
     *
     * @return DomainEvents
     */
    public function getRecordedEvents(): DomainEvents;

    /**
     * Clear all recorded events.
     */
    public function clearRecordedEvents(): void;
}
