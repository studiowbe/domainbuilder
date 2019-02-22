<?php

namespace Studiow\DomainBuilder\Event;

use InvalidArgumentException;
use SplFixedArray;

class DomainEvents extends SplFixedArray
{
    public function __construct(array $events = [])
    {
        parent::__construct(count($events));

        foreach ($events as $i => $event) {
            $this->guardValidItem($event);
            $this->offsetSet($i, $event);
        }
    }

    protected function guardValidItem($input)
    {
        if (! $input instanceof DomainEvent) {
            throw new InvalidArgumentException('Item must implement '.DomainEvent::class);
        }
    }
}
