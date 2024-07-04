<?php

namespace SandysMan\OfficesFileConversion\Parsers\Addresses;

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
        return $this->getSecondPartOfRegularPatternFromFullName(PatternsListEnum::STREET_NAME_PATTERN->value);
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

    /**
     * Получаем номер офиса
     * @return string
     */
    public function getOfficeNumber(): string
    {
        return $this->getSecondPartOfRegularPatternFromFullName(PatternsListEnum::OFFICE_PATTERN->value);
    }

    /**
     * Получаем номер офиса с префиксом офис
     * @return string
     */
    public function getFullOfficeNumber(): string
    {
       if ($officeNumber = $this->getOfficeNumber()) {
           return PartsEnum::FULL_OFFICE_TEXT->value . " " . $officeNumber;
       }

       return "";
    }

    /**
     * Получаем номер апартаментов
     * @return string
     */
    public function getApartmentNumber(): string
    {
        return $this->getSecondPartOfRegularPatternFromFullName(PatternsListEnum::APARTMENTS_PATTERN->value);
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

    /**
     * Получаем вторую часть по регулярному выражению из полного адреса
     * @param string $pattern
     * @return string
     */
    private function getSecondPartOfRegularPatternFromFullName(string $pattern): string
    {
        if (
            preg_match($pattern, $this->getFullName(), $addressParts) &&
            $addressParts[2]
        ){
            return $addressParts[2];
        }

        return "";
    }
}