<?php

namespace Parsers;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class PhoneTest extends TestCase
{
    #[DataProvider('providerOfPhones')]
    public function testGetCountryNumber(array $testPhones)
    {
        $result = "";

        if ($testPhones["PHONE"]) {
            foreach ($this->getRulesForPhones() as $rule) {
                if (preg_match($rule["PATTERN"], $testPhones["PHONE"])) {
                    $result = $rule["GET_COUNTRY_NUMBER"]($testPhones["PHONE"]);
                }
            }
        }

        $this->assertEquals($testPhones["EXPECT"], $result);
    }

    /**
     * Храним правила для телефонов, для проверки
     * @return array[]
     */
    private function getRulesForPhones(): array
    {
        return [
            [
                "PATTERN"            => "/\d{1}-\d{3}-\d{3}-\d{2}-\d{2}$/",
                "GET_COUNTRY_NUMBER" => fn(string $phone) => substr(str_replace("-", "", $phone), 1)
            ]
        ];
    }

    public static function providerOfPhones(): array
    {
        return [
            [
                [
                    "PHONE"     => "8-800-775-86-90",
                    "EXPECT"    => "8007758690"
                ],
            ],
            [
                [
                    "PHONE"     => "8-800-775-86-89",
                    "EXPECT"    => "8007758689"
                ],
            ],
            [
                [
                    "PHONE"     => "8-800-775-86-86",
                    "EXPECT"    => "8007758686"
                ]
            ]
        ];
    }
}