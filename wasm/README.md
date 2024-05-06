This library generates a WASM with one function, `ast`, to be used in the frontend.

First, install `wasm-pack` on your machine:

```bash
cargo install wasm-pack
```

Then, build the WASM (make sure you are in the `wasm` directory):

```bash
wasm-pack build --target web --out-dir ../public/js/ast
```
