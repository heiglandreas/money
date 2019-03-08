<?php

declare(strict_types=1);

/**
 * Copyright by the Money-Contributors
 *
 * Licenses under the MIT-license. For details see the included file LICENSE.md
 */

namespace Org_Heigl\ValueObject\Money;

abstract class Currency
{
    const NONE = 'No Currency';
    const EURO = 'Euro';
    const US_DOLLAR = 'US-Dollar';
    const BRITISH_POUND = 'British Pound';

    protected $name;

    protected $currencySignMajor = '€';

    protected $currencySignMinor = '¢';

    public function getName() : string
    {
        return $this->name;
    }

    public function getCurrencySign() : string
    {
        return $this->currencySignMajor;
    }

    public function getMinorCurrencySign() : string
    {
        return $this->currencySignMinor;
    }
}