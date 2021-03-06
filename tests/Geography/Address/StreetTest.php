<?php

declare(strict_types=1);

namespace Talentify\ValueObject\Geography\Address;

use PHPUnit\Framework\TestCase;

class StreetTest extends TestCase
{
    public function testMustInstantiate() : void
    {
        $street = new Street('Commercial Road', '30', 'second floor');

        $this->assertEquals('Commercial Road', $street->getName());
        $this->assertEquals('30', $street->getNumber());
        $this->assertEquals('second floor', $street->getOtherIdentifiers());
    }

    public function testThirdParametersIsNotRequired() : void
    {
        $street = new Street('Commercial Road', '30');

        $this->assertEquals('Commercial Road', $street->getName());
        $this->assertEquals('30', $street->getNumber());
        $this->assertEquals(null, $street->getOtherIdentifiers());
    }
}
