<?php

namespace Studiow\DomainBuilder\Event;

interface IsEventSourced
{
    /**
     * Recreate the entity based on its history.
     *
     * @param History $history
     *
     * @return static
     */
    public static function buildFromHistory(History $history);
}
