<?php

namespace OfficesFileConversion\Parsers\Addresses;

/**
 * Храним паттерны для работы с адресом
 */
enum AddressPatternsList: string
{
    /**
     * Паттерн для получения города
     */
    case CITY_NAME_PATTERN = '/г\.([^\d\s]+)/u';
}
