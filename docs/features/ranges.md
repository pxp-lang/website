# Ranges <Badge type="tip" text="implemented" />

Range expressions produce an iterator that yields value in the given range. They can be [exclusive (x..y)](#exclusive), inclusive (x..=y) or endless (x..).

They are a more powerful alternative to PHP's native `range(x, y, step: 1)` function as instead of returning a plain array, they instead return an object with a collection of utility methods. PHP's native function only supports inclusive ranges too, resulting in additional function calls to remove elements.

## Exclusive

An exclusive range (`x..y`) will create an iterable from `x` (inclusive) to `y` (exclusive) in steps of one. 

::: code-group

```pxp [exclusive.pxp]
$range = 0..3;

foreach ($range as $n) {
    echo $n . "\n";
}
```

```php [exclusive.php]
$range = range(0, 3);

array_pop($range);

foreach ($range as $n) {
    echo $n . "\n";
}
```

:::


The code above will produce the following output:

```
0
1
2
```

## Inclusive

An inclusive range (`x..=y`) will create an iterable from `x` (inclusive) to `y` (inclusive) in steps of one. 

::: code-group

```pxp [inclusive.pxp]
$range = 0..3;

foreach ($range as $n) {
    echo $n . "\n";
}
```

```php [inclusive.php]
$range = range(0, 3);

foreach ($range as $n) {
    echo $n . "\n";
}
```

:::


The code above will produce the following output:

```
0
1
2
3
```

## Endless

An endless range (`x..`) will create an iterable from `x` (inclusive) to `INF` in steps of one.

::: code-group

```pxp [endless.pxp]
foreach (80.. as $port) {
    if (! is_port_available($port)) {
        continue;
    }
}
```

```php [endless.php]
for ($port = 80; ; $port++) {
    if (! is_port_available($port)) {
        continue;
    }
}
```

:::

## Iterators

Each kind of range has a dedicated object.

| Type | Object |
| - | - |
| `x..y` | `Pxp\Runtime\Range\ExclusiveRange` |
| `x..=y` | `Pxp\Runtime\Range\InclusiveRange` |
| `x..` | `Pxp\Runtime\Range\EndlessRange` |

All of these objects implement the following interface:

```php
interface Range extends \Countable, \IteratorAggregate
{
    public function inclusive(): bool;
    public function exclusive(): bool;
    public function endless(): bool;
    public function includes(int|float|string $needle): bool;
    public function min(): int|float|string;
    public function max(): int|float|string;
    public function minmax(): array;
    public function entries(): array;
}
```

> View the [full interface definition](#definition) below for more information about each method.

By implementing `Countable`, you can use PHP's native `count()` function to get the length of a range.

> Endless ranges cannot be passed to `count()` as the length is infinite. Doing so will throw a `Pxp\Runtime\Range\Exceptions\InvalidRangeOperationException`.

The `\IteratorAggregate` implementation allows you to use the `Range` objects in a similar fashion to PHP arrays. You can use them anywhere an `iterable` is accepted and inside of `foreach` statements.

## Definition

```php
interface Range extends Countable, IteratorAggregate
{
    /**
     * Check if the range is inclusive.
     * 
     * @return bool 
     */
    public function inclusive(): bool;

    /**
     * Check if the range is exclusive.
     * 
     * @return bool 
     */
    public function exclusive(): bool;

    /**
     * Check if the range is endless.
     * 
     * @return bool 
     */
    public function endless(): bool;

    /**
     * Check if `$value` is included in the range.
     * 
     * @param int|float|string $needle 
     * @return bool 
     */
    public function includes(int|float|string $needle): bool;

    /**
     * Retrieve the minimum value from the range.
     * 
     * @return int|float|string 
     */
    public function min(): int|float|string;

    /**
     * Retreive the maximum value from the range.
     * 
     * @return int|float|string 
     */
    public function max(): int|float|string;

    /**
     * Retrieve a tuple containing the minimum and maximum values from the range.
     * 
     * @return array{int|float|string, int|float|string}
     */
    public function minmax(): array;

    /**
     * Retreive an array containing all entries in the range.
     * 
     * @return array 
     */
    public function entries(): array;
}
```