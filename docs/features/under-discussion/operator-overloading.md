# Operator Overloading <Badge type="warning" text="under discussion" />

Operator overloading allows developers to change how certain operators interact with objects. In existing PHP implementations, this behaviour is normally achieved with methods calls.

```php
class Vector2
{
    public function __construct(
        public int|float $x,
        public int|float $y,
    ) {}

    public function add(Vector2 $other): Vector2
    {
        return new Vector2($this->x + $other->x, $this->y + $other->y);
    }
}

$a = new Vector2(0, 5);
$b = new Vector2(1, -4);
$c = $a->add($b); // Vector2(1, 1)
```

This kind of behaviour ultimately leads to lengthy and obscure method chains.

The goal behind this proposal is to allow objects to overload a subset of PHP's operators without the need for verbose method calls.

```pxp
$a = new Vector2(0, 5);
$b = new Vector2(1, -4);
$c = $a + $b; // Vector2(1, 1)
```

## Operators and Methods

To overload an operator, an object must implement one of the methods from the table below.

| Operator | Method |
| --- | --- |
| `+` | `__add(mixed $other): mixed` |
| `-` | `__sub(mixed $other): mixed` |
| `*` | `__mul(mixed $other): mixed` |
| `/` | `__div(mixed $other): mixed` |
| `%` | `__mod(mixed $other): mixed` |
| `**` | `__pow(mixed $other): mixed` |
| `.` | `__concat(mixed $other): mixed` |
| `!` | `__bool(): bool` |
| `==` | `__equal(mixed $other): bool` |
| `===` | `__identical(self $other): bool` |

With the exception of the `__bool()` and `__identical()` methods, all methods are described with `mixed` parameter and return types above. The intention here is that objects should narrow down the types to the accepted ones to ensure compatibilty and cover edge cases.

Taking the `Vector2` example from above, you might use the following code:

```pxp
class Vector2
{
    public function __construct(
        public int|float $x,
        public int|float $y,
    ) {}

    public function __mul(int | float $other): Vector2
    {
        return new Vector2($this->x * $other, $this->y * $other);
    }

    public function __add(Vector2 $other): Vector2
    {
        return new Vector2($this->x + $other->x, $this->y + $other->y);
    }
}
```

The `Vector2` class can now be added to another `Vector2` or it can be scaled up by multiply by an `int` or `float`.

### Why not use an interface for each method?

Using Rust as an example, you can overload an operator by implementing a trait from the `std::ops` module. This approach results in an enforced method signature which is problematic in PHP.

If you defined the following interface:

```php
interface Add
{
    public function __add($other);
}
```

An implementing class wouldn't be able to specify the type of `$other` in the method because the concrete implementation would no longer be compatible with the interface's definition.

## Implementation

The generated PHP code for operator overloads would ultimately result in method calls on the operands.

::: code-group

```pxp [math.pxp]
$a = new Vector2(0, 5);
$b = new Vector2(1, -4);
$c = $a + $b; // Vector2(1, 1)
```

```php [math.php]
$a = new Vector2(0, 5);
$b = new Vector2(1, -4);
$c = $a->__add($b); // Vector2(1, 1)
```

:::

It would be the responsibility of the static analysis engine to ensure objects implement the correct methods and that the operands are supported for that operation. Of course, PHP's runtime type checks would still happen in the generated PHP code because they are still method calls under-the-hood.