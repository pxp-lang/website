# Short Match <Badge type="warning" text="under discussion" />

The `match` expression was introduced in PHP 8.0 to improve on the existing `switch` statement and provide a clean way to pattern match against a value.

In more complex scenarios, it's possible to match against a boolean value `true` and use arbitrarily complex patterns in each condition. To improve developer experience, PXP allows omitting the condition altogether to produce a "short match" which matches against `true` by default.

::: code-group

```pxp [match.pxp]
match {
    $a instanceof User && $a->is_admin => ...
}
```

```php [match.php]
match (true) {
    $a instanceof User && $a->is_admin => ...
}
```

:::