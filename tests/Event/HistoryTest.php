<?php

namespace Studiow\DomainBuilder\Test\Event;

use PHPUnit\Framework\TestCase;
use Studiow\DomainBuilder\Event\History;
use Studiow\DomainBuilder\Identity\Identifier\StringIdentifier;
use Studiow\DomainBuilder\Test\TestDomain\GenericEvent;

class HistoryTest extends TestCase
{
    public function testCreatingHistory()
    {
        $id = StringIdentifier::fromString('test-id');
        $ev = GenericEvent::fromPayload(['foo' => 'bar']);

        $history = new History($id, [$ev]);
        $this->assertTrue($history->getIdentifier()->equals($id));

        $this->assertSame($ev, $history[0]);
    }
}
