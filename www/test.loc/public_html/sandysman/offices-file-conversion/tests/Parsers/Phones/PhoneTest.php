<?php

namespace Parsers\Phones;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once "PhonesProvider.php";

final class PhoneTest extends TestCase
{
    use PhonesProvider;

    /**
     * Храним паттерны для телефонов
     */
    private const PATTERNS = [
        "RUS_MOBILE_PHONE" => '/\d{1}-\d{3}-\d{3}-\d{2}-\d{2}$/'
    ];

    #[DataProvider('providerOfPhones')]
    public function testGetCountryNumber(array $testPhones)
    {
        $result = "";

        if ($testPhones["PHONE"]) {
            foreach ($this->getRulesTransformationForCountryNumbers() as $rule) {
                if (preg_match($rule["PATTERN"], $testPhones["PHONE"])) {
                    $result = $rule["TRANSFORMATION"]($testPhones["PHONE"]);
                    break;
                }
            }
        }

        $this->assertEquals($testPhones["EXPECT_COUNTRY_PHONE"], $result);
    }

    #[DataProvider('providerOfPhones')]
    public function testGetOfficialNumber(array $testPhones)
    {
        $result = "";

        if ($testPhones["PHONE"]) {
            foreach ($this->getRulesTransformationForOfficialNumbers() as $rule) {
                if (preg_match($rule["PATTERN"], $testPhones["PHONE"])) {
                    $result = $rule["TRANSFORMATION"]($testPhones["PHONE"]);
                    break;
                }
            }
        }

        $this->assertEquals($testPhones["EXPECT_OFFICIAL_PHONE"], $result);
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
}