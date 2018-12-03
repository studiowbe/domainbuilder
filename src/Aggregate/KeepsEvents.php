<?php

namespace Studiow\DomainBuilder\Aggregate;

use Studiow\DomainBuilder\Event\EventCollection;

interface KeepsEvents
{
    /**
     * Get a list of all (unprocessed) events.
     *
     * @return EventCollection
     */
    public function getEvents(): EventCollection;

    /**
     * Clear all events.
     */
    public function clearEvents(): void;
}
