<?php

namespace OfficesFileConversion\Parsers\Addresses;

/**
 * Интерфейс для реализации коротких форматов адресов
 */
interface ShortsFormatsAddressParser
{
    /**
     * Получаем короткое название улицы
     * @return string
     */
    public function getShortCutStreetName(): string;
}