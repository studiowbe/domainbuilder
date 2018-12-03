<?php

namespace Studiow\DomainBuilder\Test\TestDomain\Model\Events;

use Studiow\DomainBuilder\Aggregate\Identifier;
use Studiow\DomainBuilder\Event\Event;
use Studiow\DomainBuilder\Test\TestDomain\Model\PostId;

class TitleChangedEvent implements Event
{
    private $id;
    private $title;

    public function __construct(PostId $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    public function getIdentifier(): Identifier
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
