<?php
/**
 * Copyright Andrea Heigl <andreas@heigl.org>
 *
 * Licenses under the MIT-license. For details see the included file LICENSE.md
 */

namespace Org_Heigl\ValueObject\MoneyTest;

use Org_Heigl\ValueObject\Money\Currency;
use Org_Heigl\ValueObject\Money\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    /**
     * @dataProvider createFromStringProvider
     * @covers \Org_Heigl\ValueObject\Money\Money::create
     * @covers \Org_Heigl\ValueObject\Money\Money::createFromString
     * @covers \Org_Heigl\ValueObject\Money\Money::getMinor
     * @covers \Org_Heigl\ValueObject\Money\Money::getMajor
     * @covers \Org_Heigl\ValueObject\Money\Money::getCurrency
     */
    public function testCreateFromString($string, $major, $minor)
    {
        $money = Money::createFromString($string);

        self::assertSame($major, $money->getMajor());
        self::assertSame($minor, $money->getMinor());
        self::assertInstanceOf(Currency\None::class, $money->getCurrency());
    }

    public function createFromStringProvider() : array
    {
        return [
            ['1.0', '1', '0'],
            ['1', '1', '0'],
            ['.0', '0', '0'],
            ['.01', '0', '01'],
            ['1,2', '1', '2'],
        ];
    }
}
