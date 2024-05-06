import {basicSetup} from "codemirror"
import {EditorView, keymap} from "@codemirror/view"
import {indentWithTab} from "@codemirror/commands"
import {php} from "@codemirror/lang-php"
import { indentUnit } from "@codemirror/language";

let editorView;

window.addEventListener("DOMContentLoaded", () => {

    editorView = new EditorView({
        doc: "<?php\n\necho \"Hello, World!\";\n",
        extensions: [
            basicSetup, 
            php(),
            keymap.of([indentWithTab]),
            indentUnit.of("    "),
            EditorView.updateListener.of(update => {
                if (update.docChanged) {
                    updateAst(update.state.doc.toString());
                }
            })
        ],
        parent: document.querySelector('.code')
    });

});


function updateAst(code) {
    if (!window.ast)
        return;

    try {
        const astOutput = ast(code);
        document.querySelector('.preview').innerHTML = astOutput;
    } catch (e) {
        document.querySelector('.preview').innerHTML = `<div class="error">Unable to parse the given code</div>`;
        return;
    }
}

window.updateFromEditorView = function() {
    if (!editorView)
        return;

    updateAst(editorView.state.doc.toString());
}