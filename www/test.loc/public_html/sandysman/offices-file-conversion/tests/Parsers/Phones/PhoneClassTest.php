<?php

namespace Parsers\Phones;

use OfficesFileConversion\Parsers\Phones\Phone;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once "PhonesProvider.php";

class PhoneClassTest extends TestCase
{
    use PhonesProvider;

    #[DataProvider('providerOfPhones')]
    public function testGetCountryNumber(array $testPhones)
    {
        $this->assertEquals($testPhones["EXPECT_COUNTRY_PHONE"], (new Phone($testPhones["PHONE"]))->getCountryNumber());
    }

    #[DataProvider('providerOfPhones')]
    public function testGetOfficialNumber(array $testPhones)
    {
        $this->assertEquals($testPhones["EXPECT_OFFICIAL_PHONE"], (new Phone($testPhones["PHONE"]))->getOfficialNumber());
    }
}
