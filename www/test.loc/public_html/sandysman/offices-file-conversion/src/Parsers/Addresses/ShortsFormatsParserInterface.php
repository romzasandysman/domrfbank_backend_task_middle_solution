<?php

namespace OfficesFileConversion\Parsers\Addresses;

/**
 * Интерфейс для реализации коротких форматов адресов
 */
interface ShortsFormatsParserInterface
{
    /**
     * Получаем название улицы в коротком представлении
     * @return string
     */
    public function getShortFormatedStreetName(): string;
}