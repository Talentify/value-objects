<?php

declare(strict_types=1);

namespace Talentify\ValueObject\Geography\Address\ByCountry\Us;

use Talentify\ValueObject\Geography\Address\PostalCode;
use Talentify\ValueObject\StringUtils;

/**
 * @see https://en.wikipedia.org/wiki/ZIP_Code
 */
class ZipCode extends PostalCode
{
    protected function setValue(string $value): void
    {
        $value = StringUtils::trimSpacesWisely($value);
        $changedValue = StringUtils::removeNonWordCharacters($value);
        $characters = strlen($changedValue);

        if ($characters == 4) {
            $value = '0' . $value;
            $characters++;
        }

        if (empty($value) || ctype_digit($changedValue) !== true || ($characters != 5 && $characters != 9)) {
            throw new \InvalidArgumentException(sprintf('The value "%s" is not a valid postal code.', $value));
        }

        parent::setValue($value);
    }
}
