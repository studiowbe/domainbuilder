<?php

namespace Studiow\DomainBuilder\Aggregate;

interface HasIdentifier
{
    public function getIdentifier(): Identifier;
}
