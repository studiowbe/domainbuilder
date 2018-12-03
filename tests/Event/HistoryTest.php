<?php

namespace Studiow\DomainBuilder\Test\Event;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Studiow\DomainBuilder\Event\History;
use Studiow\DomainBuilder\Test\TestDomain\Model\Events\ContentChangedEvent;
use Studiow\DomainBuilder\Test\TestDomain\Model\Events\TitleChangedEvent;
use Studiow\DomainBuilder\Test\TestDomain\Model\PostId;

class HistoryTest extends TestCase
{
    public function testBuildingHistory()
    {
        $post_id = PostId::fromString('test-id');
        $events = [
            new TitleChangedEvent($post_id, 'title'),
            new ContentChangedEvent($post_id, 'content'),
        ];

        $history = new History($post_id, $events);
        $this->assertEquals(2, count($history));
    }

    public function testInvalidIdentifierThrowsException()
    {
        $post_id = PostId::fromString('test-id');
        $other_id = PostId::fromString('other-id');
        $events = [
            new TitleChangedEvent($post_id, 'title'),
            new ContentChangedEvent($other_id, 'content'),
        ];
        $this->expectException(InvalidArgumentException::class);
        new History($post_id, $events);
    }
}
