# Your First PXP File

This page will introduce you to the PXP command line tool and teach you how to write your first PXP file.

## Creating a file

Start by creating a new file called `hello.pxp`.

```sh
$ touch hello.pxp
```

Open the file in your chosen text editor and insert the following code:

```php
<?php

echo "Hello, world!\n";
```

> There's no PXP specific syntax here just yet. This is just focused on actually processing the PXP file and producing PHP code.

## Building

Before building, ensure you have added the `hello.pxp` file to the `paths` array in your configuration file.

```json
{
    "paths": [
        "./hello.pxp"
    ],
    // ...
}
```

To build the `hello.pxp` file, use the `pxp build` command.

```sh
vendor/bin/pxp build
```

This will produce a `hello.php` file in the same directory as the `hello.pxp` file with the generated PHP code.
