<?php

namespace Studiow\DomainBuilder\Aggregate\Traits;

use Studiow\DomainBuilder\Event\Event;

trait KeepsAndAppliesEventsTrait
{
    use AppliesEventsTrait, KeepsEventsTrait;

    public function keepAndApply(Event $event)
    {
        $this->registerEvent($event);
        $this->apply($event);
    }
}
