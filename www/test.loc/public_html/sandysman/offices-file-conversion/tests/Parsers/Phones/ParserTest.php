<?php

namespace Parsers\Phones;

use OfficesFileConversion\Parsers\Phones\Parser;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    #[DataProvider('providerOfPhones')]
    public function testGetCountryNumber(array $testPhones)
    {
        $this->assertEquals($testPhones["EXPECT_COUNTRY_PHONE"], (new Parser($testPhones["PHONE"]))->getCountryNumber());
    }

    #[DataProvider('providerOfPhones')]
    public function testGetOfficialNumber(array $testPhones)
    {
        $this->assertEquals($testPhones["EXPECT_OFFICIAL_PHONE"], (new Parser($testPhones["PHONE"]))->getOfficialNumber());
    }

    public static function providerOfPhones(): array
    {
        return [
            [
                [
                    "PHONE"                 => "8-800-775-86-90",
                    "EXPECT_COUNTRY_PHONE"  => "8007758690",
                    "EXPECT_OFFICIAL_PHONE" => "8(800)775-86-90"
                ],
            ],
            [
                [
                    "PHONE"                 => "8-800-775-86-89",
                    "EXPECT_COUNTRY_PHONE"  => "8007758689",
                    "EXPECT_OFFICIAL_PHONE" => "8(800)775-86-89"
                ],
            ],
            [
                [
                    "PHONE"                 => "8-800-775-86-86",
                    "EXPECT_COUNTRY_PHONE"  => "8007758686",
                    "EXPECT_OFFICIAL_PHONE" => "8(800)775-86-86"
                ]
            ],
            [
                [
                    "PHONE"                 => "",
                    "EXPECT_COUNTRY_PHONE"  => "",
                    "EXPECT_OFFICIAL_PHONE" => ""
                ]
            ]
        ];
    }
}
