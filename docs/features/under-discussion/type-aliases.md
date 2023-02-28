# Type Aliases <Badge type="warning" text="under discussion" />

Type aliases are common in statically typed languages and provide a way of abstracting a type and reducing repetition in your code.

The code example below demonstrates a simplified version of a trait from the [Filament](https://filamentphp.com/) project that uses the same type definition in multiple places inside of a trait. You can compare the code in PXP and PHP by switching tabs.

::: code-group

```pxp [HasLabel.pxp]
type Label = string | Htmlable | Closure | null;

trait HasLabel
{
    protected Label $label = null;

    public function label(Label $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getLabel(): Label ~ Closure
    {
        return $this->evaluate($this->label);
    }
}
```

```php [HasLabel.php]
trait HasLabel
{
    protected string | Htmlable | Closure | null $label = null;

    public function label(string | Htmlable | Closure | null $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getLabel(): string | Htmlable | null
    {
        return $this->evaluate($this->label);
    }
}
```

:::

As you can see in the PHP code example above, the type of a label is defined in a few different places. If you wanted to add an additional valid type to the example, you would need to change the code in 3 different places.

With the conversion to PXP, you can create an alias to a type and would only need to change the underlying type in a single location.

When PXP processes and transpiles the file, it will replace all of the aliases with their underlying type so that PHP can still execute the same runtime type checks as before.

## Type exclusion

You may have noticed an unusual type definition on line 14 of the `HasLabel` example above, `Label ~ Closure`. In PXP, this operation is known as "type exclusion".

The idea here is that you can use a single type alias in multiple places and narrow down the underlying type when necessary. The `HasLabel` trait will never actually return a `Closure` from the `getLabel()` method, so having that type there is unnecessary and could be the cause of unexpected behaviour.

Specifiying the return type as `Label ~ Closure` will remove the `Closure` type during processing and transpile down to just `string | Htmlable | null`.

## Cross-file type aliases

In most cases a type alias will only be used locally, that is, in the file where the type alias is defined. This is the default behaviour in PXP meaning type aliases are not made available globally. There are definitely some valid use-cases for sharing a type alias across files, for example generic return types for methods or multiple classes that accept the same type of value across methods.

You can import a type alias from another class in a similar fashion to functions and constants, with a `use` statement at the top of the file.

::: code-group

```pxp [one.pxp]
namespace App\One;

type number = int|float;

function add(number $a, number $b): number {
    // ...
}
```

```pxp [two.pxp]
namespace App\Two;

use type App\One\number;

function sub(number $a, number $b): number {
    // ...
}
```

:::

Type aliases are prefixed with the namespace in which they are defined, just like other forms of definitions in PHP. By importing the type, PXP will bring it into scope and check for usage of that type during compilation.