<?php

namespace OfficesFileConversion\Parsers;

/**
 * Парсер телефона
 */
readonly class Phone implements PhoneParser
{
    /**
     * @param string $phone - исходный номер телефона
     */
    public function __construct(
        private string $phone
    )
    {
    }

    public function getCountryNumber(): string
    {
        // TODO: Implement getCountryNumber() method.
    }

    public function getOfficialNumber(): string
    {
        // TODO: Implement getOfficialNumber() method.
    }
}