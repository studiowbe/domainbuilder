<?php

namespace Studiow\DomainBuilder\Identity\Identifier;

use Studiow\DomainBuilder\Identity\Identifier;

abstract class IdentifierBase implements Identifier
{
    /**
     * Check if this identifier equals another identifier.
     *
     * @param Identifier $compareWith
     *
     * @return bool
     */
    public function equals(Identifier $compareWith): bool
    {
        if (get_class($this) === get_class($compareWith)) {
            return $this->toString() === $compareWith->toString();
        }

        return false;
    }
}
