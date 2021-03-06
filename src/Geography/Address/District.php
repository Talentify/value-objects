<?php

declare(strict_types=1);

namespace Talentify\ValueObject\Geography\Address;

use Talentify\ValueObject\StringUtils;
use Talentify\ValueObject\ValueObject;

class District implements AddressElement
{
    /** @var string */
    private $name;

    /**
     * @throws \InvalidArgumentException if supplied value is invalid.
     */
    public function __construct(string $name)
    {
        $this->setName($name);
    }

    private function setName(string $name) : void
    {
        $normalized = StringUtils::trimSpacesWisely($name);
        if (empty($normalized)) {
            throw new \InvalidArgumentException(sprintf('The value "%s" is not a valid district name.', $name));
        }

        $this->name = StringUtils::convertCaseToTitle($normalized);
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function equals(?ValueObject $object) : bool
    {
        if (! $object instanceof self) {
            return false;
        }

        return $object->getName() === $this->getName();
    }

    public function getFormatted() : string
    {
        return sprintf('%s', $this->getName());
    }

    public function __toString() : string
    {
        return $this->name;
    }

    public function jsonSerialize()
    {
        return [
            'name'      => $this->name,
        ];
    }
}
