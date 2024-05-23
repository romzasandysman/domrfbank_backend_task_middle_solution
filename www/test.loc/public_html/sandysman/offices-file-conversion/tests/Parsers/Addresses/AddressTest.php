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
        $address = new Address($adressProviver["ADDRESS"]);
        $this->assertEquals($adressProviver["CITY_NAME"], $address->getCityName());
    }

    #[DataProvider('providerOfAddress')]
    public function testGetStreetName(array $adressProviver)
    {
        $address = new Address($adressProviver["ADDRESS"]);
        $this->assertEquals($adressProviver["STREET_NAME"], $address->getStreetName());
    }

    #[DataProvider('providerOfAddress')]
    public function testGetHouseNumber(array $adressProviver)
    {
        $address = new Address($adressProviver["ADDRESS"]);
        $this->assertEquals($adressProviver["HOUSE_NUMBER"], $address->getHouseNumber());
    }

    #[DataProvider('providerOfAddress')]
    public function testGetOfficeNumber(array $adressProviver)
    {
        $address = new Address($adressProviver["ADDRESS"]);
        $this->assertEquals($adressProviver["OFFICE_NUMBER"], $address->getOfficeNumber());
    }

    #[DataProvider('providerOfAddress')]
    public function testGetApartmentNumber(array $adressProviver)
    {
        $address = new Address($adressProviver["ADDRESS"]);
        $this->assertEquals($adressProviver["APARTMENT_NUMBER"], $address->getApartmentNumber());
    }

    #[DataProvider('providerOfAddress')]
    public function testGetFullAddress(array $adressProviver)
    {
        $address = new Address($adressProviver["ADDRESS"]);
        $this->assertEquals($adressProviver["ADDRESS"], $address->getFullName());
    }

    #[DataProvider('providerOfAddress')]
    public function testGetShortCutStreetName(array $adressProviver)
    {
        $address = new Address($adressProviver["ADDRESS"]);
        $this->assertEquals($adressProviver["SHORTCUT_STREET_NAME"], $address->getShortCutStreetName());
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
                    "APARTMENT_NUMBER"      => "",
                    "SHORTCUT_STREET_NAME"  => "",
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
                    "CITY_NAME"             => "Сочи",
                    "STREET_NAME"           => "проспект Огарева",
                    "SHORTCUT_STREET_NAME"  => "пр-т Огарева",
                    "HOUSE_NUMBER"          => "45/2",
                    "OFFICE_NUMBER"         => "",
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
                    "APARTMENT_NUMBER"      => "",
                ]
            ]
        ];
    }
}
