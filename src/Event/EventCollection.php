<?php

namespace Studiow\DomainBuilder\Event;

use ArrayIterator;
use Countable;
use InvalidArgumentException;
use IteratorAggregate;

class EventCollection implements Countable, IteratorAggregate
{
    private $events = [];

    public function __construct(array $events = [])
    {
        array_map(function ($event) {
            $this->guardValidItem($event);
            $this->events[] = $event;
        }, $events);
    }

    /**
     * Check if the item is valid.
     *
     * @param $input
     *
     * @throws InvalidArgumentException
     */
    protected function guardValidItem($input): void
    {
        if (! $input instanceof Event) {
            throw new InvalidArgumentException();
        }
    }

    /**
     * Get an array of all events in the collection.
     *
     * @return Event[]
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    public function count()
    {
        return count($this->events);
    }

    public function getIterator()
    {
        return new ArrayIterator($this->events);
    }
}
