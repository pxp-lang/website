# Auto-capture Closures

Since the introduction of arrow functions `fn () => ...` in PHP 7.4, many PHP developers have been looking for a solution to multi-line auto-capturing closures. The current solution to using out-of-scope variables inside of a closure involves specifying each variable inside of the function's `use` clause.

```php
function wrap(Closure $callback, ...$args): Closure {
    return function () use ($callback, $args) {
        return $callback(...$args);
    };
}
```

An attempt to introduce auto-capturing closures was attempted in May 2022 ([RFC](https://wiki.php.net/rfc/auto-capture-closure)) but the vote was just shy of the 2/3 majority required to pass.

PXP follows this proposal very closely with its implementation of auto-capturing closures. Converting the `wrap()` function above would look something like below:

```pxp
function wrap(Closure $callback, ...$args): Closure {
    return fn () {
        return $callback(...$args);
    };
}
```

The `use` clause can be completely removed as PXP will handle the capturing automatically during transpilation.

## Capturing by-value or by-reference

As described by the [RFC](https://wiki.php.net/rfc/auto-capture-closure), the surrounding environment is captured by-value. This means that trying to update the value of a variable will only affect the variable inside of the closure's own scope and not the surrounding scope.

The only exception to this rule is updating / interacting with a variable that holds an object, since the underlying value is still a reference to an object in memory. This behavour is consistent with arrow functions.