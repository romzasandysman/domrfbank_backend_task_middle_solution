<?php

namespace OfficesFileConversion\Parsers\Phones;

/**
 * Парсер телефона
 */
class Phone implements PhoneParser
{
    /**
     * Храним паттерны для телефонов
     */
    private const PATTERNS = [
        "RUS_MOBILE_PHONE" => '/\d{1}-\d{3}-\d{3}-\d{2}-\d{2}$/'
    ];

    /**
     * @var array - храним уже отформатированные телефоны
     */
    private array $formattedPhones = [
        "COUNTRY_NUMBER"    => "",
        "OFFICIAL_NUMBER"   => ""
    ];

    /**
     * @param string $phone - исходный номер телефона
     */
    public function __construct(
        private readonly string $phone
    )
    {
    }

    /**
     * Получаем номер в формате страны
     * @return string
     */
    public function getCountryNumber(): string
    {
        if ($this->getPhone() && !$this->formattedPhones["COUNTRY_NUMBER"]) {
            foreach ($this->getRulesTransformationForCountryNumbers() as $rule) {
                if (preg_match($rule["PATTERN"], $this->getPhone())) {
                    $this->formattedPhones["COUNTRY_NUMBER"] = $rule["TRANSFORMATION"]($this->getPhone());
                    break;
                }
            }
        }

        return $this->formattedPhones["COUNTRY_NUMBER"];
    }

    /**
     * Получаем официальный номер
     * @return string
     */
    public function getOfficialNumber(): string
    {
        if ($this->getPhone() && !$this->formattedPhones["OFFICIAL_NUMBER"]) {
            foreach ($this->getRulesTransformationForOfficialNumbers() as $rule) {
                if (preg_match($rule["PATTERN"], $this->getPhone())) {
                    $this->formattedPhones["OFFICIAL_NUMBER"] = $rule["TRANSFORMATION"]($this->getPhone());
                    break;
                }
            }
        }

        return $this->formattedPhones["OFFICIAL_NUMBER"];
    }

    /**
     * Храним правила преобразования телефонов, для формата страны
     * @return array[]
     */
    private function getRulesTransformationForCountryNumbers(): array
    {
        return [
            [
                "PATTERN"        => self::PATTERNS["RUS_MOBILE_PHONE"],
                "TRANSFORMATION" => fn(string $phone) => substr(str_replace("-", "", $phone), 1),
            ]
        ];
    }

    /**
     * Храним правила преобразования телефонов, для официального формата
     * @return array[]
     */
    private function getRulesTransformationForOfficialNumbers(): array
    {
        return [
            [
                "PATTERN"        => self::PATTERNS["RUS_MOBILE_PHONE"],
                "TRANSFORMATION" => fn(string $phone) => preg_replace("/-/", ")", preg_replace("/-/", "(", $phone, 1), 1),
            ]
        ];
    }

    /**
     * Получаем исходный телефон
     * @return string
     */
    private function getPhone(): string
    {
        return $this->phone;
    }
}