<?php

namespace Studiow\DomainBuilder\Event;

use InvalidArgumentException;
use Studiow\DomainBuilder\Aggregate\HasIdentifier;
use Studiow\DomainBuilder\Aggregate\Identifier;

class History extends EventCollection implements HasIdentifier
{
    private $id;

    public function __construct(Identifier $identifier, array $events = [])
    {
        $this->id = $identifier;
        parent::__construct($events);
    }

    public function getIdentifier(): Identifier
    {
        return $this->id;
    }

    /**
     * Check if the item is valid.
     *
     * @param $input
     *
     * @throws InvalidArgumentException
     */
    protected function guardValidItem($input): void
    {
        /*
         * Item must implement Event interface
         */
        parent::guardValidItem($input);

        /**
         * Item must we have the proper identifier.
         *
         * @var $input Event
         */
        if (! $input->getIdentifier()->equals($this->getIdentifier())) {
            throw new InvalidArgumentException();
        }
    }
}
