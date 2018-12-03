<?php

namespace Studiow\DomainBuilder\Test\Event;

use PHPUnit\Framework\TestCase;
use Studiow\DomainBuilder\Event\EventCollection;
use Studiow\DomainBuilder\Test\TestDomain\Model\Events\ContentChangedEvent;
use Studiow\DomainBuilder\Test\TestDomain\Model\Events\TitleChangedEvent;
use Studiow\DomainBuilder\Test\TestDomain\Model\PostId;

class EventCollectionTest extends TestCase
{
    public function testCountingEventsInCollection()
    {
        $post_id = PostId::fromString('test-id');
        $collection = new EventCollection([
            new TitleChangedEvent($post_id, 'title'),
            new ContentChangedEvent($post_id, 'content'),
        ]);

        $this->assertEquals(2, count($collection));
    }

    public function testRetrievingEvents()
    {
        $post_id = PostId::fromString('test-id');
        $events = [
            new TitleChangedEvent($post_id, 'title'),
            new ContentChangedEvent($post_id, 'content'),
        ];
        $collection = new EventCollection($events);
        $this->assertEquals($events, $collection->getEvents());
    }

    public function testIteratingEvents()
    {
        $post_id = PostId::fromString('test-id');
        $events = [
            new TitleChangedEvent($post_id, 'title'),
            new ContentChangedEvent($post_id, 'content'),
        ];
        $collection = new EventCollection($events);
        $this->assertEquals($events, iterator_to_array($collection));
    }
}
