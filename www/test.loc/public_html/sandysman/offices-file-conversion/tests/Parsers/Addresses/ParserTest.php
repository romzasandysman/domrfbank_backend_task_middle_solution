<?php

namespace Parsers\Addresses;

use OfficesFileConversion\Parsers\Addresses\Parser;
use PHPUnit\Framework\TestCase;
use \PHPUnit\Framework\Attributes\DataProvider;

class ParserTest extends TestCase
{
    #[DataProvider('providerOfAddress')]
    public function testGetCityName(array $adressProviver)
    {
        $address = new Parser($adressProviver["ADDRESS"]);
        $this->assertEquals($adressProviver["CITY_NAME"], $address->getCityName());
    }

    #[DataProvider('providerOfAddress')]
    public function testGetStreetName(array $adressProviver)
    {
        $address = new Parser($adressProviver["ADDRESS"]);
        $this->assertEquals($adressProviver["STREET_NAME"], $address->getStreetName());
    }

    #[DataProvider('providerOfAddress')]
    public function testGetHouseNumber(array $adressProviver)
    {
        $address = new Parser($adressProviver["ADDRESS"]);
        $this->assertEquals($adressProviver["HOUSE_NUMBER"], $address->getHouseNumber());
    }

    #[DataProvider('providerOfAddress')]
    public function testGetOfficeNumber(array $adressProviver)
    {
        $address = new Parser($adressProviver["ADDRESS"]);
        $this->assertEquals($adressProviver["OFFICE_NUMBER"], $address->getOfficeNumber());
    }

    #[DataProvider('providerOfAddress')]
    public function testGetFullOfficeNumber(array $adressProviver)
    {
        $address = new Parser($adressProviver["ADDRESS"]);
        $this->assertEquals($adressProviver["FULL_OFFICE_NUMBER"], $address->getFullOfficeNumber());
    }

    #[DataProvider('providerOfAddress')]
    public function testGetApartmentNumber(array $adressProviver)
    {
        $address = new Parser($adressProviver["ADDRESS"]);
        $this->assertEquals($adressProviver["APARTMENT_NUMBER"], $address->getApartmentNumber());
    }

    #[DataProvider('providerOfAddress')]
    public function testGetFullParser(array $adressProviver)
    {
        $address = new Parser($adressProviver["ADDRESS"]);
        $this->assertEquals($adressProviver["ADDRESS"], $address->getFullName());
    }

    #[DataProvider('providerOfAddress')]
    public function testGetShortFormatedStreetName(array $adressProviver)
    {
        $address = new Parser($adressProviver["ADDRESS"]);
        $this->assertEquals($adressProviver["SHORTCUT_STREET_NAME"], $address->getShortFormatedStreetName());
    }

    public static function providerOfAddress(): array
    {
        return [
            [
                [
                    "ADDRESS"               => "г.Москва улица Воздвиженка дом 10",
                    "CITY_NAME"             => "Москва",
                    "STREET_NAME"           => "Воздвиженка",
                    "HOUSE_NUMBER"          => "10",
                    "OFFICE_NUMBER"         => "",
                    "FULL_OFFICE_NUMBER"    => "",
                    "APARTMENT_NUMBER"      => "",
                    "SHORTCUT_STREET_NAME"  => "ул. Воздвиженка",
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
                    "FULL_OFFICE_NUMBER"    => "офис 2",
                    "APARTMENT_NUMBER"      => "",
                ],
            ],
            [
                [
                    "ADDRESS"               => "г.Сочи улица проспект Огарева дом 45/2",
                    "CITY_NAME"             => "Сочи",
                    "STREET_NAME"           => "проспект Огарева",
                    "SHORTCUT_STREET_NAME"  => "пр-т Огарева",
                    "HOUSE_NUMBER"          => "45/2",
                    "OFFICE_NUMBER"         => "",
                    "FULL_OFFICE_NUMBER"    => "",
                    "APARTMENT_NUMBER"      => "",
                ]
            ],
            [
                [
                    "ADDRESS"               => "",
                    "CITY_NAME"             => "",
                    "STREET_NAME"           => "",
                    "HOUSE_NUMBER"          => "",
                    "OFFICE_NUMBER"         => "",
                    "FULL_OFFICE_NUMBER"    => "",
                    "APARTMENT_NUMBER"      => "",
                    "SHORTCUT_STREET_NAME"  => ""
                ]
            ],
            [
                [
                    "ADDRESS"               => "г.344433 улица проспект Огарева дом 45/2",
                    "CITY_NAME"             => "",
                    "STREET_NAME"           => "проспект Огарева",
                    "SHORTCUT_STREET_NAME"  => "пр-т Огарева",
                    "HOUSE_NUMBER"          => "45/2",
                    "OFFICE_NUMBER"         => "",
                    "FULL_OFFICE_NUMBER"    => "",
                    "APARTMENT_NUMBER"      => "",
                ]
            ],
            [
                [
                    "ADDRESS"               => "г.344433 улица проспект Огарева дом 45/2 апартаменты 23",
                    "CITY_NAME"             => "",
                    "STREET_NAME"           => "проспект Огарева",
                    "SHORTCUT_STREET_NAME"  => "пр-т Огарева",
                    "HOUSE_NUMBER"          => "45/2",
                    "OFFICE_NUMBER"         => "",
                    "FULL_OFFICE_NUMBER"    => "",
                    "APARTMENT_NUMBER"      => "23",
                ]
            ]
        ];
    }
}
