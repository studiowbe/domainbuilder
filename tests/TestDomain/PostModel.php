<?php

namespace Studiow\DomainBuilder\Test\TestDomain;

use Studiow\DomainBuilder\AggregateBase;
use Studiow\DomainBuilder\Identity\Identifier\StringIdentifier;
use Studiow\DomainBuilder\Test\TestDomain\PostEvent\PostWasCreated;

class PostModel extends AggregateBase
{
    private $title;

    public static function create(string $title = null)
    {
        $obj = self::createEmpty(StringIdentifier::fromString('my-post-id'));
        $obj->recordAndApplyEvent(new PostWasCreated($title));

        return $obj;
    }

    public function applyPostWasCreated(PostWasCreated $ev)
    {
        $this->title = $ev->getTitle();
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
