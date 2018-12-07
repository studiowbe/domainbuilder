<?php

namespace Studiow\DomainBuilder\Test\Aggregate\Identifier;

use PHPUnit\Framework\TestCase;
use Studiow\DomainBuilder\Aggregate\Identifier\StringIdentifier;

class StringIdentifierTest extends TestCase
{
    public function testCreatingIdentifier()
    {
        $id = StringIdentifier::fromString('test-id');
        $this->assertEquals('test-id', (string) $id);

        $this->assertTrue(
            $id->equals(StringIdentifier::fromString('test-id'))
        );

        $this->assertFalse(
            $id->equals(StringIdentifier::fromString('test-id-2'))
        );
    }
}
