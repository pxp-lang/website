# Constant Variables <Badge type="warning" text="under discussion" />

All variables in PHP are mutable by default. You can assign a value to a variable as many times as you wish. Many modern languages also have support for constant variables, e.g. JavaScript with `const` and Rust with `let`.

This proposal includes new syntax for creating constant variables that cannot be re-assigned after initial their initial declaration.

## Syntax

PHP already has support for `const` statements inside of class-like structures and procedural code. This proposal suggests an extension of this syntax that would allow the following.

::: code-group

```pxp [const-var.pxp]
const $foo = 100;
```

```php [const-var.php]
$foo = 100;
```

:::

An optional type can also be provided for the variable. This will be used by the static analyser to enforce type safe assignment.

::: code-group

```pxp [const-var-type.pxp]
const int $foo = 100;
```

```php [const-var-type.php]
$foo = 100;
```

:::

## Comparison to regular constants

PHP does already have support for constants through `const` declarations and calls to `define()`.

These behave in a similar fashion to constant variables such that you cannot re-declare them or change the held value.

The major difference in behaviour is what type of values can be held in the first place.

PHP's constants are only capable of storing the following values:
* `string`
* `int`
* `float`
* `bool`
* `array`

The `array` type has even further restrictions that mean you can only create an array using constant expressions. This prevents you from calling functions, referencing variables and more.

Constant variables in PXP can hold any type of value that a regular variable can hold.