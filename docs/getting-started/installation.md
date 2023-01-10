# Installation <Badge type="info" text="subject to change" />

Since PXP is still in the early stages of development, the recommended installation method is building from source.

## Requirements

* Git
* [Rust toolchain (Cargo, etc)](https://www.rust-lang.org/tools/install)
* macOS or Linux (not officially tested on Windows)

## Setup

1. Use `cargo` to install PXP using Git.

```sh
$ cargo install --git https://github.com/pxp-lang/pxp
```

2. Ensure Cargo's bin directory is inside of your `$PATH`
3. Check `pxp` is installed by outputting the version.

```sh
$ pxp --version
pxp 0.0.0-b1
```
