<?php

namespace Studiow\DomainBuilder\Behaviour;

use Studiow\DomainBuilder\Event\DomainEvent;

trait AppliesEventsTrait
{
    public function applyEvent(DomainEvent $event): void
    {
        $eventName = get_class($event);
        $methodName = 'apply'.substr($eventName, strrpos($eventName, '\\') + 1);
        call_user_func([$this, $methodName], $event);
    }
}
