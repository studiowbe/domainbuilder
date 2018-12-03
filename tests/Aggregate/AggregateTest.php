<?php

namespace Studiow\DomainBuilder\Test\Aggregate;

use PHPUnit\Framework\TestCase;
use Studiow\DomainBuilder\Event\History;
use Studiow\DomainBuilder\Test\TestDomain\Model\Events\ContentChangedEvent;
use Studiow\DomainBuilder\Test\TestDomain\Model\Events\TitleChangedEvent;
use Studiow\DomainBuilder\Test\TestDomain\Model\Post;
use Studiow\DomainBuilder\Test\TestDomain\Model\PostId;

class AggregateTest extends TestCase
{
    public function testAggregateKeepsEvents()
    {
        $post_id = PostId::fromString('test-post');
        $post = new Post($post_id);

        $post->setTitle('the title');
        $post->setContent('the content');

        $expected_events = [
            new TitleChangedEvent($post_id, 'the title'),
            new ContentChangedEvent($post_id, 'the content'),
        ];

        $this->assertEquals(2, count($post->getEvents()));
        $this->assertEquals($expected_events, $post->getEvents()->getEvents());
    }

    public function testAggregateCanBeBuiltFromHistory()
    {
        $post_id = PostId::fromString('test-post');
        $history = new History(
            $post_id, [
                new TitleChangedEvent($post_id, 'the title'),
                new ContentChangedEvent($post_id, 'the content'),
            ]
        );

        $post = Post::buildFromHistory($history);
        $this->assertEquals($post_id, $post->getIdentifier());
        $this->assertEquals('the title', $post->getTitle());
        $this->assertEquals('the content', $post->getContent());
    }
}
