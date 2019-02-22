<?php

namespace Studiow\DomainBuilder\Behaviour;

use Studiow\DomainBuilder\Event\History;
use Studiow\DomainBuilder\Identity\Identifier;

trait IsEventSourcedTrait
{
    use RecordsAndAppliesEventsTrait;

    /**
     * Recreate the entity based on its history.
     *
     * @param History $history
     *
     * @return static
     */
    public static function buildFromHistory(History $history)
    {
        $entity = static::createEmpty($history->getIdentifier());
        foreach ($history as $event) {
            $entity->applyEvent($event);
        }

        return $entity;
    }

    /**
     * Create a new entity.
     *
     * @param Identifier $id
     *
     * @return static
     */
    abstract protected static function createEmpty(Identifier $id);
}
