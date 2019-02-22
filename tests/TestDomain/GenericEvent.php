<?php

namespace Studiow\DomainBuilder\Test\TestDomain;

use Studiow\DomainBuilder\Event\DomainEvent;

class GenericEvent implements DomainEvent
{
    private $payload = [];

    private function __construct(array $payload = [])
    {
        $this->payload = $payload;
    }

    public function getPayload(): array
    {
        return $this->payload;
    }

    public static function fromPayload(array $payload = [])
    {
        return new self($payload);
    }
}
