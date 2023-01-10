# Variable Types <Badge type="warning" text="under discussion" />

Variables in PHP can hold values of any type and the type of held value can change over time.

```php
$i = 1;
$i = "Hello, world!";
```

This can be useful, but there are use cases for statically typing variables too. This proposal for PXP would introduce a new `var` statement that can be used to declare a variable with a static type.

```pxp
var int $i = 1;
```

Here is a pseudo-grammar represenation of the statement.

```
"var" <type> <variable> ("=" <expression>?) ";"
```

## Syntax choice

The `var` keyword has been chosen since it already exists in PHP and therefore avoids a new keyword such as `let`. It also helps to avoid ambiguity in the parser.

## Runtime

By default, PXP will only analyse variable usage and assignment statically. The generated PHP code will still be dynamic, so if you choose to build without analysing first, you could still run into unexpected behaviour at runtime.

There are plans to introduce runtime type checks for variables as well. This is achievable with existing PHP structures, but would introduce a potential performance overhead.

```php
var int $i = 0;

try {
    $i = (function (): int {
        return 5;
    })();
} catch (\TypeError $e) {
    // Rethrow here with a better message specific to the variable assignment.
};
```

## Type inference

There are no plans to support type inference for typed variables at this moment in time.