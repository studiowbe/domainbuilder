<?php

namespace Studiow\DomainBuilder\Test\Identity\Identifier;

use PHPUnit\Framework\TestCase;
use Studiow\DomainBuilder\Identity\Identifier\StringIdentifier;

class StringIdentifierTest extends TestCase
{
    public function testCreatingIdentifier()
    {
        $id = StringIdentifier::fromString('test-id');

        $this->assertEquals('test-id', $id->toString());
    }

    public function testComparingIdentifier()
    {
        $id = StringIdentifier::fromString('test-id');

        $this->assertTrue($id->equals(StringIdentifier::fromString('test-id')));
        $this->assertFalse($id->equals(StringIdentifier::fromString('another-id')));
    }
}
