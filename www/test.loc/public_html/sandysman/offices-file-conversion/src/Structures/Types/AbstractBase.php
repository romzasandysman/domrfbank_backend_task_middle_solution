<?php

namespace OfficesFileConversion\Structures\Types;

use OfficesFileConversion\Parsers\Addresses\Parser as AddressParser;
use OfficesFileConversion\Parsers\Phones\Parser as PhoneParser;

/**
 * Базовая реализация типа структуры данных для офисов
 */
abstract class AbstractBase
{
    /**
     * @param int $id                       - id офиса
     * @param string $name                  - имя офиса
     * @param AddressParser $addressParser  - парсер адреса офиса
     * @param PhoneParser $phoneParser      - парсер телефона офиса
     */
    public function __construct(
        private int $id,
        private string $name,
        private AddressParser $addressParser,
        private PhoneParser $phoneParser
    )
    {
    }
}