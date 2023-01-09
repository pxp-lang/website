# Project Configuration

Although the `pxp` binary can be used to process individual files, it's generally more useful to build all PXP files inside of your project.

Before you can do this, you need to initialize your project and do some minor configuration.

## Generating the `pxp.toml` file

All of PXP's configuration is done via a single [TOML](https://toml.io/) file in the root of your project. You can manually create this file or use the `pxp init` command to generate a basic one for you.

```sh
$ pxp init
```

The generated file should look something like this:

```toml
[build]
paths = [
    "./"
]
```

## Configuration

### Build

The `[build]` section is used to configure PXP's build process.

#### `paths`

This configuration value should contain an array of paths that PXP will use to discover files when building your project. By default, it will search all folders relative to the current directory. In most cases, you will want to narrow down this search to your `/src` or `/app` folder to improve build performance.

#### `outdir` (todo)

By default, PXP will store the generated PHP code in a file with the same name as the source file, inside of the same directory. The main benefit to this approach is that tools such as Composer will still be able to autoload classes using PSR-4 namespacing without making any changes to your `autoload` configuration.

If you wish to change this behaviour, you can use the `outdir` configuration option to specify a custom output directory. Files written to this directory will still use the same directory structure as the source file, but the root path will be replaced.

```toml
[build]
paths = [
    "./src"
]
outdir = "./out"
```