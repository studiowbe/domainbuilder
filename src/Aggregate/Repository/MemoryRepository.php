<?php


namespace Studiow\DomainBuilder\Aggregate\Repository;


use Studiow\DomainBuilder\Aggregate\AggregateRepository;

use Studiow\DomainBuilder\Aggregate\KeepsEvents;
use Studiow\DomainBuilder\Event\EventStore;

abstract class MemoryRepository implements AggregateRepository
{

    protected $eventStore;

    public function __construct(EventStore $eventStore = null)
    {
        $this->eventStore = $eventStore ?? new EventStore\MemoryEventStore();
    }

    public function persist(KeepsEvents $aggregate)
    {
        $this->eventStore->persist($aggregate->getEvents());
        $aggregate->clearEvents();
    }

}