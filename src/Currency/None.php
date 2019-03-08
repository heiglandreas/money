<?php

declare(strict_types=1);

/**
 * Copyright by the Money-Contributors
 *
 * Licenses under the MIT-license. For details see the included file LICENSE.md
 */

namespace Org_Heigl\ValueObject\Money\Currency;

use Org_Heigl\ValueObject\Money\Currency;

class None extends Currency
{
    protected $name = 'No Currency';

    protected $currencySignMajor = '';

    protected $currencySignMinor = '';
}