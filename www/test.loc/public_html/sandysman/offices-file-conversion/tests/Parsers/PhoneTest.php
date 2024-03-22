<?php

namespace Parsers;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class PhoneTest extends TestCase
{
    #[DataProvider('providerOfPhones')]
    public function testGetCountryNumber(string $phone)
    {
        $this->assertEquals("8-800-775-86-90", $phone);
    }

    public static function providerOfPhones(): array
    {
        return [
            [
                "8-800-775-86-90"
            ]
        ];
    }
}