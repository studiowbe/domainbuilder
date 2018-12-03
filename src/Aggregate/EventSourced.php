<?php

namespace Studiow\DomainBuilder\Aggregate;

use Studiow\DomainBuilder\Event\History;

interface EventSourced
{
    public static function buildFromHistory(History $history);
}
