<?php

declare(strict_types=1);

/**
 * Copyright Money-Contributors
 *
 * Licenses under the MIT-license. For details see the included file LICENSE.md
 */

namespace Org_Heigl\ValueObject\Money;

use Org_Heigl\ValueObject\Money\Exception\StringDoesNotRepresentMoney;

final class Money
{
    private $major;

    private $minor;

    private $currency;

    private function __construct(string $major, string $minor, Currency $currency)
    {
        $this->major = $major;
        $this->minor = $minor;
        $this->currency = $currency;
    }

    public function getMajor() : string
    {
        return $this->major;
    }

    public function getMinor() : string
    {
        return $this->minor;
    }

    public function getValue() : string
    {
        return (string) $this->major . '.' . $this->minor;
    }

    public function getCurrency() : Currency
    {
        return $this->currency;
    }

    public static function create(string $major, string $minor, string $currency = Currency::NONE) : self
    {
        return new self($major, $minor, CurrencyFactory::createFromCurrencyName($currency));
    }

    public static function createFromString(string $value, string $currency = Currency::NONE) : self
    {
        if (! preg_match('/[0-9]*([\.\,]?)[0-9]*/', $value, $matches)) {
            throw new StringDoesNotRepresentMoney(sprintf('The String "%s" does not represent Money', $value));
        }

        if (! $matches[1]) {
            return self::create($value, "0", $currency);
        }

        $value = explode($matches[1], $value);

        if (! $value[0]) {
            $value[0] = "0";
        }
        if (! isset($value[1])) {
            $value[1] = "0";
        }

        return self::create($value[0], $value[1], $currency);
    }
}