<?php

namespace Studiow\DomainBuilder\Identity;

interface Identifier
{
    /**
     * Create an identifier from a (stored) string.
     *
     * @param string $storedId
     *
     * @return static
     */
    public static function fromString(string $input);

    /**
     * Convert the identifier to its string representation.
     *
     * @return string
     */
    public function toString(): string;

    /**
     * Check if this identifier equals another identifier.
     *
     * @param Identifier $compareWith
     *
     * @return bool
     */
    public function equals(Identifier $compareWith): bool;
}
