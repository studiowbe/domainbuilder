<?php

namespace Studiow\DomainBuilder;

use Studiow\DomainBuilder\Event\IsEventSourced;
use Studiow\DomainBuilder\Event\RecordsEvents;
use Studiow\DomainBuilder\Identity\HasIdentifier;

interface Aggregate extends HasIdentifier, RecordsEvents, IsEventSourced
{
}
