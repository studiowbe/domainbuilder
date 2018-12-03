<?php

namespace Studiow\DomainBuilder\Test\TestDomain\Model\Events;

use Studiow\DomainBuilder\Aggregate\Identifier;
use Studiow\DomainBuilder\Event\Event;
use Studiow\DomainBuilder\Test\TestDomain\Model\PostId;

class ContentChangedEvent implements Event
{
    private $id;
    private $content;

    public function __construct(PostId $id, string $content)
    {
        $this->id = $id;
        $this->content = $content;
    }

    public function getIdentifier(): Identifier
    {
        return $this->id;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
