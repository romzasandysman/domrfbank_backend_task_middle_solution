<?php

namespace SandysMan\OfficesFileConversion\Structures\Types;

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

    /**
     * Получаем имя офиса
     * @return string
     */
    protected function getName(): string
    {
        return $this->name;
    }

    /**
     * Получаем объект парсера адреса
     * @return AddressParser
     */
    protected function getAddressParser(): AddressParser
    {
        return $this->addressParser;
    }

    /**
     * Получаем объект парсера телефона
     * @return PhoneParser
     */
    protected function getPhoneParser(): PhoneParser
    {
        return $this->phoneParser;
    }

    /**
     * Получаем id офиса
     * @return int
     */
    protected function getId(): int
    {
        return $this->id;
    }

    /**
     * Получаем тип данных для офиса
     * @return string
     */
    protected function getType(): string
    {
        return TypesEnum::OFFICE->value;
    }
}