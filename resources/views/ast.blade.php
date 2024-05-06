<script type="importmap">
    {
        "imports": {
            "@codemirror/": "https://deno.land/x/codemirror_esm@v6.0.1/esm/"
        }
    }
</script>

<style>
    .ast {
        display: flex;
        height: 100%;
        background-color: rgb(244 244 245);
    }
    .code {
        flex: 1;
        flex-shrink: 0;
        border-right: 2px solid rgb(212 212 216);
        overflow: auto;
    }
    .code .cm-editor {
        height: 100%;
    }
    .preview {
        flex: 1;
        height: 100%;
        overflow: auto;
        white-space: pre-wrap;
        padding: 15px;
    }
    body {
        height: 100vh!important;
        overflow: hidden;
    }
    main {
        min-height: 0;
    }
    .error {
        color: #b91c1c;
        display: flex;
        height: 100%;
        align-items: center;
        justify-content: center;
    }
</style>

<x-layouts.main title="AST">

    <div class="ast">
        <div class="code"></div>
        <div class="preview"></div>
    </div>

</x-layouts.main>

<script type="module">

    import init, { ast } from "./js/ast/wasm.js";
    init().then(() => {
        window.ast = ast;

        window.updateFromEditorView && window.updateFromEditorView();
    });

</script>