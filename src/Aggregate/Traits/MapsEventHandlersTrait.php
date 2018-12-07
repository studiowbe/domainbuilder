<?php


namespace Studiow\DomainBuilder\Aggregate\Traits;


use Studiow\DomainBuilder\Event\Event;

trait MapsEventHandlersTrait
{
    protected $eventHandlers = [];

    protected function setEventHandler(string $event_name, $callback)
    {
        $this->eventHandlers[$event_name] = $callback;
        return $this;
    }

    protected function handleEvent(Event $event)
    {
        $handler = $this->eventHandlers[get_class($event)] ?? null;

        if (is_callable($handler)) {
            call_user_func($handler, $event);
        }
    }
}