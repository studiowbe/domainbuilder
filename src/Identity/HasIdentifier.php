<?php

namespace Studiow\DomainBuilder\Identity;

interface HasIdentifier
{
    public function getIdentifier(): Identifier;
}
