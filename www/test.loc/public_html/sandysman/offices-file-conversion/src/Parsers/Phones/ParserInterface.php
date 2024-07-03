<?php

namespace OfficesFileConversion\Parsers\Phones;

/**
 * Интерфейс для реализации парсера телефона
 */
interface ParserInterface
{
    /**
     * Получаем номер в формате страны
     * @return string
     */
    public function getCountryNumber(): string;

    /**
     * Получаем номер в официальном формате 8(800)
     * @return string
     */
    public function getOfficialNumber(): string;
}