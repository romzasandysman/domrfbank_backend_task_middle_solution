<?php

namespace OfficesFileConversion\Parsers\Addresses;

/**
 * Части из которых может состоять адрес
 */
enum PartsEnum: string
{
    /**
     * Проспект в полном виде
     */
    case FULL_AVENUE_TEXT = "проспект";

    /**
     * Короткий вариант написания проспекта
     */
    case SHORT_AVENUE_TEXT = "пр-т";

    /**
     * Коротки вариант написания улицы
     */
    case SHORT_STREET_TEXT = "ул.";
}