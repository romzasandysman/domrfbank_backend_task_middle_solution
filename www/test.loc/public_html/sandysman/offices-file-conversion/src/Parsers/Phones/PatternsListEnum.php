<?php

namespace OfficesFileConversion\Parsers\Phones;

/**
 * Храним паттерны для телефонов
 */
enum PatternsListEnum: string
{
    /**
     * Российский формат номера
     */
    case RUS_MOBILE_PHONE = "/\d{1}-\d{3}-\d{3}-\d{2}-\d{2}$/";
}
