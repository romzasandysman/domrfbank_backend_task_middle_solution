<?php

namespace OfficesFileConversion\Parsers\Addresses;

/**
 * Храним паттерны для работы с адресом
 */
enum PatternsListEnum: string
{
    /**
     * Паттерн для получения города
     */
    case CITY_NAME_PATTERN = '/г\.([^\d\s]+)/u';

    /**
     * Паттерн для получения значения улицы
     */
    case STREET_NAME_PATTERN = '/(улица\s+)([а-яА-ЯёЁ\s]*?)(\s+дом)/u';

    /**
     * Паттерн на получение номера дома
     */
    case HOUSE_PATTERN = "/(дом\s+)(\d+)(\/(\d+))?/i";

    /**
     * Паттерн на получение номера офиса
     */
    case OFFICE_PATTERN = "/(офис\s+)(\d+)/i";

    /**
     * Паттерн на получение номера аппартаментов
     */
    case APARTMENTS_PATTERN = "/(апартаменты\s+)(\d+)/i";
}
