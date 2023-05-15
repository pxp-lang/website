# Match Blocks <Badge type="warning" text="under discussion" />

Another downside to using PHP's `match` expression is that you're limited to only a single expression in a match arm. This is fine if you want to defer the logic to a method or function call, but it can be useful to execute multiple pieces of logic inline.

This can be achieved in PHP by using an IIFE (immediately invoked function expression) and bringing values into scope with a `use` clause, but the syntax is rather verbose. 

PXP provides syntactic sugar over this by allowing you to execute a block of code inside of a match arm and return a value from the block.

::: code-group

```pxp [multi-line-match.pxp]
function value_in_cents(Coin $coin): int
{
    return match ($coin) {
        Coin::Penny => {
            echo "{$coin->name} is a lucky one!";
            return 1;
        },
        Coin::Nickel => 5,
        Coin::Dime => 10,
        Coin::Quarter => 25,
    };
}
```

```php [multi-line-match.php]
function value_in_cents(Coin $coin): int
{
    return match ($coin) {
        Coin::Penny => (function () use (&$coin) {
            echo "{$coin->name} is a lucky one!";
            return 1;
        })(),
        Coin::Nickel => 5,
        Coin::Dime => 10,
        Coin::Quarter => 25,
    };
}
```

:::