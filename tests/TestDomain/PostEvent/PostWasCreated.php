<?php

namespace Studiow\DomainBuilder\Test\TestDomain\PostEvent;

use Studiow\DomainBuilder\Event\DomainEvent;

class PostWasCreated implements DomainEvent
{
    private $title;

    public function __construct(string $title = null)
    {
        $this->title = $title ?? 'new post';
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPayload(): array
    {
        return [
            'title' => $this->title,
        ];
    }

    public static function fromPayload(array $payload = [])
    {
        return new self($payload['title'] ?? null);
    }
}
