<?php

namespace Studiow\DomainBuilder\Identity\Identifier;

class StringIdentifier extends IdentifierBase
{
    private $id;

    protected function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * Create an identifier from a (stored) string.
     *
     * @param string $storedId
     *
     * @return static
     */
    public static function fromString(string $input)
    {
        return new static($input);
    }

    /**
     * Convert the identifier to its string representation.
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->id;
    }
}
