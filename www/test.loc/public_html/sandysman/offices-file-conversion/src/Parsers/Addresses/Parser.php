<?php

namespace OfficesFileConversion\Parsers\Addresses;

/**
 * Парсер для строки адреса
 */
readonly class Parser implements FullParserInterface
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
            preg_match(PatternsListEnum::CITY_NAME_PATTERN->value, $this->getFullName(), $addressParts) &&
            $addressParts[1]
        ) {
            return $addressParts[1];
        }

        return "";
    }

    /**
     * Получаем название улицы
     * @return string
     */
    public function getStreetName(): string
    {
        if (
            preg_match(PatternsListEnum::STREET_NAME_PATTERN->value, $this->getFullName(), $addressParts) &&
            $addressParts[2]
        ){
            return $addressParts[2];
        }
        return "";
    }

    /**
     * Получаем номер дома
     * @return string
     */
    public function getHouseNumber(): string
    {
        if (
            preg_match(PatternsListEnum::HOUSE_PATTERN->value, $this->getFullName(), $addressParts) &&
            $addressParts[2]
        ){
            return $addressParts[2] . $addressParts[3];
        }

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

    /**
     * Получаем короткий формат отображения улицы
     * @return string
     */
    public function getShortFormatedStreetName(): string
    {
        $street = $this->getStreetName();
        
       if (str_contains($street, PartsEnum::FULL_AVENUE_TEXT->value)) {
           return str_replace(PartsEnum::FULL_AVENUE_TEXT->value, PartsEnum::SHORT_AVENUE_TEXT->value, $street);
       }
       
       if ($street) {
           return PartsEnum::SHORT_STREET_TEXT->value . " " . $street;
       }
       
       return "";
    }
}