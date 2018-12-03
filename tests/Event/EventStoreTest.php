<?php

namespace Studiow\DomainBuilder\Test\Event;

use PHPUnit\Framework\TestCase;
use Studiow\DomainBuilder\Event\EventCollection;
use Studiow\DomainBuilder\Event\EventStore\MemoryEventStore;
use Studiow\DomainBuilder\Test\TestDomain\Model\Events\ContentChangedEvent;
use Studiow\DomainBuilder\Test\TestDomain\Model\Events\TitleChangedEvent;
use Studiow\DomainBuilder\Test\TestDomain\Model\PostId;

class EventStoreTest extends TestCase
{
    public function testSavingEvents()
    {
        $post_id = PostId::fromString('test-id');
        $other_id = PostId::fromString('other-id');

        $titleEvents = [
            new TitleChangedEvent($post_id, 'Title 1'),
            new TitleChangedEvent($other_id, 'Title 2'),
        ];

        $contentEvents = [
            new ContentChangedEvent($post_id, 'Content'),
        ];

        $store = new MemoryEventStore();
        $store->persist(new EventCollection($titleEvents));
        $store->persist(new EventCollection($contentEvents));

        $this->assertEquals(2, count($store->getHistoryForId($post_id)));
        $this->assertEquals(1, count($store->getHistoryForId($other_id)));
    }
}
