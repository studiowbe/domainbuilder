<?php

namespace Studiow\DomainBuilder\Aggregate\Identifier;

use Exception;
use Ramsey\Uuid\Uuid;

class Uuid4Identifier extends StringIdentifier
{
    /**
     * @throws Exception
     *
     * @return static
     */
    public static function generate()
    {
        if (! class_exists('Ramsey\\Uuid\\Uuid')) {
            throw new Exception('Package Ramsey\\Uuid not loaded');
        }

        return new static(Uuid::uuid4());
    }
}
