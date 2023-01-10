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