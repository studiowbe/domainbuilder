<?php

namespace Studiow\DomainBuilder\Event;

interface DomainEvent
{
    /**
     * Get the data stored in the event.
     *
     * @return array
     */
    public function getPayload(): array;

    /**
     * Build an event from data.
     *
     * @param array $payload
     *
     * @return static
     */
    public static function fromPayload(array $payload = []);
}
