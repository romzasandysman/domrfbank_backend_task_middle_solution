<?php

namespace Parsers\Addresses;

use OfficesFileConversion\Parsers\Addresses\Address;
use PHPUnit\Framework\TestCase;
use \PHPUnit\Framework\Attributes\DataProvider;

class AddressTest extends TestCase
{
    #[DataProvider('providerOfAddress')]
    public function testGetCityName(array $adressProviver)
    {
        $address = new Address();
    }

    public static function providerOfAddress(): array
    {
        return [
            [
                [
                    "ADDRESS"           => "г.Москва улица Воздвиженка дом 10",
                    "CITY_NAME"         => "Москва",
                    "STREET_NAME"       => "Воздвиженка",
                    "HOUSE_NUMBER"      => "10",
                    "OFFICE_NUMBER"     => "",
                    "APARTMENT_NUMBER"  => "",
                ],
            ],
            [
                [
                    "ADDRESS"               => "г.Воронеж улица проспект Мира дом 12 офис 2",
                    "CITY_NAME"             => "Воронеж",
                    "STREET_NAME"           => "проспект Мира",
                    "SHORTCUT_STREET_NAME"  => "пр-т Мира",
                    "HOUSE_NUMBER"          => "12",
                    "OFFICE_NUMBER"         => "2",
                    "APARTMENT_NUMBER"      => "",
                ],
            ],
            [
                [
                    "ADDRESS"               => "г.Сочи улица проспект Огарева дом 45/2",
                    "CITY_NAME"             => "Москва",
                    "STREET_NAME"           => "проспект Огарева",
                    "SHORTCUT_STREET_NAME"  => "пр-т Огарева",
                    "HOUSE_NUMBER"          => "45/2",
                    "OFFICE_NUMBER"         => "",
                    "APARTMENT_NUMBER"      => "",
                ]
            ],
            [
                [
                    "ADDRESS"           => "",
                    "CITY_NAME"         => "",
                    "STREET_NAME"       => "",
                    "HOUSE_NUMBER"      => "",
                    "OFFICE_NUMBER"     => "",
                    "APARTMENT_NUMBER"  => "",
                ]
            ]
        ];
    }
}
