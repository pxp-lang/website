use pxp_parser::parse;
use pxp_symbol::SymbolTable;
use wasm_bindgen::prelude::*;

#[wasm_bindgen]
pub fn ast(input: &str) -> String {
    let input_bytes = input.as_bytes().to_vec();
    let symbol_table = SymbolTable::the();
    let result = parse(&input_bytes, symbol_table);

    let output = format!("{:#?}", result.ast);

    return output;
}

#[cfg(test)]
mod tests {
    use super::*;

    #[test]
    fn it_works() {
        let s = ast("<?php 'Hel");
        println!("{}", s);
    }
}
