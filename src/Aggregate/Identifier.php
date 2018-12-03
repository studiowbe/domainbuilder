<?php

namespace Studiow\DomainBuilder\Aggregate;

interface Identifier
{
    /**
     * Convert Identifier to string representation.
     *
     * @return string
     */
    public function __toString();

    /**
     * Check if this identifier is equal to another identifier.
     *
     * @param Identifier $identifier
     *
     * @return bool
     */
    public function equals(Identifier $identifier): bool;

    /**
     * Create an identifier from a string.
     *
     * @param string $input
     *
     * @return self
     */
    public static function fromString(string $input);
}
