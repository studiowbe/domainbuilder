<?php

namespace Studiow\DomainBuilder\Aggregate\Identifier;

class StringIdentifier extends IdentifierBase
{
    private $id;

    protected function __construct(string $id)
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
