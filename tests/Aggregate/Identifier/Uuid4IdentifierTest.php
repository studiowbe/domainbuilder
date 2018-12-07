<?php

namespace Studiow\DomainBuilder\Test\Aggregate\Identifier;

use PHPUnit\Framework\TestCase;
use Studiow\DomainBuilder\Aggregate\Identifier\StringIdentifier;
use Studiow\DomainBuilder\Aggregate\Identifier\Uuid4Identifier;

class Uuid4IdentifierTest extends TestCase
{
    public function testCreatingIdentifier()
    {
        $id = Uuid4Identifier::fromString('test-id');
        $this->assertEquals('test-id', (string) $id);

        $this->assertTrue(
            $id->equals(Uuid4Identifier::fromString('test-id'))
        );

        $this->assertFalse(
            $id->equals(Uuid4Identifier::fromString('test-id-2'))
        );

        $this->assertFalse(
            $id->equals(StringIdentifier::fromString('test-id'))
        );
    }

    public function testGeneratingIdentifier()
    {
        $id = Uuid4Identifier::generate();
        $pattern = '#^[a-z0-9]{8}-[a-z0-9]{4}-4[a-z0-9]{3}-[a-z0-9]{4}-[a-z0-9]{12}$#';
        $this->assertEquals(1, preg_match($pattern, (string) $id));
    }
}
