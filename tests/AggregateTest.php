<?php

namespace Studiow\DomainBuilder\Test;

use PHPUnit\Framework\TestCase;
use Studiow\DomainBuilder\Event\History;
use Studiow\DomainBuilder\Identity\Identifier\StringIdentifier;
use Studiow\DomainBuilder\Test\TestDomain\PostEvent\PostWasCreated;
use Studiow\DomainBuilder\Test\TestDomain\PostModel;

class AggregateTest extends TestCase
{
    public function testCreatingPost()
    {
        $post = PostModel::create('my title');
        //event was applied
        $this->assertEquals('my title', $post->getTitle());
        //event was recorded
        $this->assertEquals(1, $post->getRecordedEvents()->count());
    }

    public function testRebuildingPost()
    {
        $id = StringIdentifier::fromString('the-post');
        $history = new History(
            $id, [
                new PostWasCreated('my title'),
            ]
        );

        $post = PostModel::buildFromHistory($history);

        //id was set
        $this->assertTrue($post->getIdentifier()->equals($id));
        //event was applied
        $this->assertEquals('my title', $post->getTitle());
        //event was NOT recorded
        $this->assertEquals(0, $post->getRecordedEvents()->count());
    }
}
