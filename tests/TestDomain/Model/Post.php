<?php

namespace Studiow\DomainBuilder\Test\TestDomain\Model;

use Studiow\DomainBuilder\Aggregate\Aggregate;
use Studiow\DomainBuilder\Aggregate\Identifier;
use Studiow\DomainBuilder\Event\Event;
use Studiow\DomainBuilder\Event\EventCollection;
use Studiow\DomainBuilder\Event\History;
use Studiow\DomainBuilder\Test\TestDomain\Model\Events\ContentChangedEvent;
use Studiow\DomainBuilder\Test\TestDomain\Model\Events\TitleChangedEvent;

class Post implements Aggregate
{
    private $id;
    private $title;
    private $content;

    private $events = [];

    public function __construct(
        PostId $id,
        string $title = '',
        string $content = ''
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }

    public static function buildFromHistory(History $history)
    {
        $post = new Post($history->getIdentifier());
        foreach ($history->getEvents() as $event) {
            $post->applyEvent($event);
        }

        return $post;
    }

    private function applyEvent(Event $event): Post
    {
        if (get_class($event) === TitleChangedEvent::class) {
            $this->title = $event->getTitle();
        } elseif (get_class($event) === ContentChangedEvent::class) {
            $this->content = $event->getContent();
        }

        return $this;
    }

    private function recordEvent(Event $event): Post
    {
        $this->events[] = $event;

        return $this;
    }

    public function getIdentifier(): Identifier
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $event = new TitleChangedEvent($this->getIdentifier(), $title);
        $this->applyEvent($event)->recordEvent($event);
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $event = new ContentChangedEvent($this->getIdentifier(), $content);
        $this->applyEvent($event)->recordEvent($event);
    }

    /**
     * Get a list of all (unprocessed) events.
     *
     * @return EventCollection
     */
    public function getEvents(): EventCollection
    {
        return new EventCollection($this->events);
    }

    /**
     * Clear all events.
     */
    public function clearEvents(): void
    {
        $this->events = [];
    }
}
