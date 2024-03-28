<?php

namespace Parsers\Phones;

/**
 * Провайдер данных для телефонов
 */
trait PhonesProvider
{
    public static function providerOfPhones(): array
    {
        return [
            [
                [
                    "PHONE"                 => "8-800-775-86-90",
                    "EXPECT_COUNTRY_PHONE"  => "8007758690",
                    "EXPECT_OFFICIAL_PHONE" => "8(800)775-86-90"
                ],
            ],
            [
                [
                    "PHONE"                 => "8-800-775-86-89",
                    "EXPECT_COUNTRY_PHONE"  => "8007758689",
                    "EXPECT_OFFICIAL_PHONE" => "8(800)775-86-89"
                ],
            ],
            [
                [
                    "PHONE"                 => "8-800-775-86-86",
                    "EXPECT_COUNTRY_PHONE"  => "8007758686",
                    "EXPECT_OFFICIAL_PHONE" => "8(800)775-86-86"
                ]
            ]
        ];
    }
}