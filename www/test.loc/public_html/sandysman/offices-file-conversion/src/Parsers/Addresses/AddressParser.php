<?php

namespace OfficesFileConversion\Parsers\Addresses;

use OfficesFileConversion\BaseInterfaces\GetFullName;

/**
 * Интерфейс для парсинга адреса
 */
interface AddressParser
{
    /**
     * Получаем название города
     * @return string
     */
    public function getCityName(): string;

    /**
     * Получаем название улицы
     * @return string
     */
    public function getStreetName(): string;

    /**
     * Получаем номер дома
     * @return string
     */
    public function getHouseNumber(): string;

    /**
     * Получаем номер офиса
     * @return string
     */
    public function getOfficeNumber(): string;

    /**
     * Получаем номер апартаментов
     * @return string
     */
    public function getApartmentNumber(): string;
}