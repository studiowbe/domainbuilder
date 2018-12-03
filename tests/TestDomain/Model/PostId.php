<?php

namespace Studiow\DomainBuilder\Test\TestDomain\Model;

use Studiow\DomainBuilder\Aggregate\Identifier;

class PostId implements Identifier
{
    private $id;

    private function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * Convert Identifier to string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->id;
    }

    /**
     * Check if this identifier is equal to another identifier.
     *
     * @param Identifier $identifier
     *
     * @return bool
     */
    public function equals(Identifier $identifier): bool
    {
        if (get_class($this) !== get_class($identifier)) {
            return false;
        }

        return (string) $this === (string) $identifier;
    }

    /**
     * Create an identifier from a string.
     *
     * @param string $input
     *
     * @return self
     */
    public static function fromString(string $input)
    {
        return new static($input);
    }
}
