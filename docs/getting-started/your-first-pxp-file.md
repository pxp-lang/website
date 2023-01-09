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

To build the `hello.pxp` file, use the `pxp build` command.

```sh
$ pxp build ./hello.pxp --stdout
```

The `--stdout` flag will print the generated PHP code in your terminal instead of writing it to disk.

You should see the following output:

```php
<?php

echo "Hello, world!\n";
```

To check that the PHP code works, pipe the output into `php`.

```sh
$ pxp build ./hello.pxp --stdout | php
```

You should see `Hello, world!` in your terminal.

## Writing to disk

Instead of outputting the generated code in the terminal, you'll likely want to write the generated code to a file.

This is as simple as removing the `--stdout` flag and running the same command again.

```sh
$ pxp build ./hello.pxp
```

This will create a new `hello.php` file next to your `hello.pxp` file with the generated PHP code.

> You can configure the output destination for generated files inside of your [project configuration](/getting-started/project-configuration).