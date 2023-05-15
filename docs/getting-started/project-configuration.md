# Project Configuration

To initialise your project, use the `pxp init` command.

```
vendor/bin/pxp init
```

This will create a `pxp.json` in the current directory with the following structure.

```json
{
    "paths": [
        "app"
    ],
    "transpiler": {
        "sourceMap": false,
        "strictTypes": false
    }
}
```

The table below describes all of the configuration options and whether they have been implemented yet.

| Option | Description | Implemented? |
| --- | --- | --- |
| `paths` | An array of directories or files that should be transpiled by PXP | ✅ |
| `transpiler.sourceMap` | Determines whether a source map should be generated when transpiling. This is used by PXP to ensure exceptions are accurate. | ❌ |
| `transpiler.strictTypes` | Whether a `declare(strict_types=1)` should be automatically added to the generated PHP code. | ❌ |