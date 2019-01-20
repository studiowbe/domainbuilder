<?php

namespace Studiow\DomainBuilder\Aggregate\Traits;

use Studiow\DomainBuilder\Event\Event;

trait AppliesEventsTrait
{
    public function apply(Event $event)
    {
        $eventName = get_class($event);
        $handler = 'apply'.substr($eventName, strrpos($eventName, '\\') + 1);
        call_user_func([$this, $handler], $event);
    }
}
