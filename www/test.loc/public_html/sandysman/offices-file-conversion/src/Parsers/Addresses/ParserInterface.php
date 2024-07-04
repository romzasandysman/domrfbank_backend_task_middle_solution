<?php

namespace SandysMan\OfficesFileConversion\Parsers\Addresses;

use SandysMan\OfficesFileConversion\BaseInterfaces\GetFullNameInterface;

/**
 * Интерфейс для парсинга адреса
 */
interface ParserInterface extends GetFullNameInterface
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
     * Получаем номер офиса с префиксом офис
     * @return string
     */
    public function getFullOfficeNumber(): string;

    /**
     * Получаем номер апартаментов
     * @return string
     */
    public function getApartmentNumber(): string;
}