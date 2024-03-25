<?php

namespace OfficesFileConversion\Parsers;

/**
 * Парсер для строки адреса
 */
readonly class Address implements AddressParser
{
    /**
     * @param string $address - адрес
     */
    public function __construct(
        private string $address
    )
    {
    }

    public function getCityName(): string
    {
        // TODO: Implement getCityName() method.
    }

    public function getStreetName(): string
    {
        // TODO: Implement getStreetName() method.
    }

    public function getHouseNumber(): string
    {
        // TODO: Implement getHouseNumber() method.
    }

    public function getOfficeNumber(): string
    {
        // TODO: Implement getOfficeNumber() method.
    }

    public function getApartmentNumber(): string
    {
        // TODO: Implement getApartmentNumber() method.
    }

    /**
     * Получаем полный адрес
     * @return string
     */
    public function getFullName(): string
    {
        return $this->address;
    }
}