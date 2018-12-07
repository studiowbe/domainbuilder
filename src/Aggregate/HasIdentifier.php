<?php

namespace Studiow\DomainBuilder\Aggregate;

interface HasIdentifier
{
    /**
     * @return Identifier
     */
    public function getIdentifier();
}
