<?php

namespace Studiow\DomainBuilder\Aggregate;

interface Aggregate extends HasIdentifier, KeepsEvents, EventSourced
{
}
