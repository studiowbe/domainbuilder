<?php

namespace Studiow\DomainBuilder\Behaviour;

use Studiow\DomainBuilder\Event\DomainEvent;

trait RecordsAndAppliesEventsTrait
{
    use RecordsEventsTrait, AppliesEventsTrait;

    public function recordAndApplyEvent(DomainEvent $event): void
    {
        $this->recordEvent($event);
        $this->applyEvent($event);
    }
}
