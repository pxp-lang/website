# Conditional Returns <Badge type="danger" text="requires implementation" />

It is common for functions and methods to perform conditional returns based on a single condition. This is commonly referred to as a "guard" statement in other programming languages that have a dedicated structure for such behaviour.

```php
function update(Contact $contact, array $data): void
{
    if (! valid($data)) {
        return;
    }

    $contact->setData($data);
}
```

One of the many benefits of these "guards" is reducing nested, rightward drift of your code due to conditional statements. PXP attempts to solve this by introducing a conditional `if ($condition)` clause at the end of a `return` statement.

::: code-group

```pxp [guard.pxp]
function update(Contact $contact, array $data): void
{
    return if (! valid($data));

    $contact->setData($data);
}
```

```php [guard.php]
function update(Contact $contact, array $data): void
{
    if (! valid($data)) {
        return;
    }

    $contact->setData($data);
}
```

:::

As you might expect, it's also possible to return a value when using a conditional return. Changing the example function to return a `bool` would result in the following code.

::: code-group

```pxp [guard.pxp]
function update(Contact $contact, array $data): bool
{
    return false if (! valid($data));

    $contact->setData($data);

    // ...

    return true;
}
```

```php [guard.php]
function update(Contact $contact, array $data): bool
{
    if (! valid($data)) {
        return false;
    }

    $contact->setData($data);

    // ...

    return true;
}
```

:::
