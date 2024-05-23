<?php

namespace OfficesFileConversion\Parsers\Addresses;

/**
 * Парсер для строки адреса
 */
readonly class Address implements FullAddressParser
{
    /**
     * @param string $address - адрес
     */
    public function __construct(
        private string $address
    )
    {
    }

    /**
     * Получаем название города
     * @return string
     */
    public function getCityName(): string
    {
        if (
            preg_match(AddressPatternsList::CITY_NAME_PATTERN->value, $this->getFullName(), $addressParts) &&
            $addressParts[1]
        ){
            return $addressParts[1];
        }

        return "";
    }

    public function getStreetName(): string
    {
        return "";
    }

    public function getHouseNumber(): string
    {
        return "";
    }

    public function getOfficeNumber(): string
    {
        return "";
    }

    public function getApartmentNumber(): string
    {
        return "";
    }

    /**
     * Получаем полный адрес
     * @return string
     */
    public function getFullName(): string
    {
        return $this->address;
    }

    public function getShortCutStreetName(): string
    {
        return "";
    }
}