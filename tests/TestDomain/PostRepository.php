<?php


namespace Studiow\DomainBuilder\Test\TestDomain;


use Studiow\DomainBuilder\Aggregate\Identifier;
use Studiow\DomainBuilder\Aggregate\Repository\MemoryRepository;
use Studiow\DomainBuilder\Test\TestDomain\Model\Post;

class PostRepository extends MemoryRepository
{
    /**
     * @param Identifier $identifier
     * @return Post
     */
    public function fromIdentifier(Identifier $identifier)
    {
        return Post::buildFromHistory($this->eventStore->getHistoryForId($identifier));
    }
}