<?php

declare(strict_types=1);

/**
 * Copyright by the Money-Contributors
 *
 * Licenses under the MIT-license. For details see the included file LICENSE.md
 */

namespace Org_Heigl\ValueObject\Money;

use Org_Heigl\ValueObject\Money\Currency\Euro;
use Org_Heigl\ValueObject\Money\Currency\None;
use Org_Heigl\ValueObject\Money\Exception\UnknownCurrency;

class CurrencyFactory
{
    private static $currencies = [
        Currency::EURO => Euro::class,
        Currency::NONE => None::class,
    ];

    public static function createFromCurrencyName(string $currencyName) : Currency
    {
        if (! isset(self::$currencies[$currencyName])) {
            throw new UnknownCurrency(sprintf('The currency %s is not known to this library', $currencyName));
        }

        return new self::$currencies[$currencyName];
    }
}