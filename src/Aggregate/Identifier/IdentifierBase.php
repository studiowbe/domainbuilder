<?php

namespace Studiow\DomainBuilder\Aggregate\Identifier;

use Studiow\DomainBuilder\Aggregate\Identifier;

abstract class IdentifierBase implements Identifier
{
    /**
     * Check if this identifier is equal to another identifier.
     *
     * @param Identifier $identifier
     *
     * @return bool
     */
    public function equals(Identifier $identifier): bool
    {
        if (get_class($this) === get_class($identifier)) {
            return (string) $this === (string) $identifier;
        }

        return false;
    }
}
