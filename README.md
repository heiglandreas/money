# Money

A PHP-Library to make handling money in a real-world scenario easier.

The main difference to the [moneyPHP-Library](https://github.com/moneyphp/money) is that the Money-Object itself 
handles Money like we all would. It is instantiated using a major and a minor denominator like US-$ and Cent or British 
Pound Sterling and Pennies.

So instead of using `Money::EUR(500)` you would use ` Money::create(5, 00, Currency::EURO)` to create a Value-Object 
representing 5,00 Euos.

The advantage is that by doing this you can use any number of decimals you want or you actually need according to 
your relevant rules of bookkeeping.

Additionally the ValueObject itself is a value-object and therefore does not know about handling relations to other 
money-objects. So all the adding, subtracting, multiplications etc are not done via the value-object itself but 
via calculators.

This library does **not** support formatting money as that is something the IntlFormatter can do best. 
Though there is a `Formatter`-class that wraps an IntlFormatter-Object so you can pass a `Money`-Object instead of a 
float to the Formatter.

## Installation

    composer require org_heigl/money

## License

This library is licensed under the MIT-License. See the [License-File](LICENSE.md) for details.

## Acknowledgements

This would not have happened without the great work from the [moneyPHP-Library](https://github.com/moneyphp/money). 
Additionally this would not have happened without the interesting discussions about Money-Objects on the PHP-UG Slack. 
