<?php

namespace Studiow\DomainBuilder\Test\Event;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use stdClass;
use Studiow\DomainBuilder\Event\DomainEvents;
use Studiow\DomainBuilder\Test\TestDomain\GenericEvent;

class DomainEventsTest extends TestCase
{
    public function testCreatingDomainEvents()
    {
        $ev = GenericEvent::fromPayload(['foo' => 'bar']);
        $collection = new DomainEvents([$ev]);
        $this->assertEquals(1, $collection->count());
        $this->assertEquals($ev, $collection[0]);
    }

    public function testItemsMustBeDomainEvents()
    {
        $this->expectException(InvalidArgumentException::class);
        new DomainEvents([new stdClass()]);
    }
}
