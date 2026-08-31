# AGENTS.md

## Project Purpose

Pure PHP interfaces library for [PHP/SAP](https://php-sap.github.io) — a contract-only package that consuming
implementations must satisfy to call SAP RFC (Remote Function Call) functions. **No concrete classes exist here.**

## Architecture

```
src/
├── IFunction.php          # Main entry point: create(), setParam(), invoke()
├── Api/                   # Describe RFC input/output schema
│   ├── IApi.php           # Container for IApiElement items (input/output/changing/table)
│   ├── IApiElement.php    # Base: name, type, direction, optional flag
│   ├── IValue.php         # Single scalar value; direction constants + type constants
│   ├── IStruct.php        # Struct with IMember columns
│   ├── ITable.php         # Table with IMember columns; rows cast from array-of-arrays
│   └── IMember.php        # Struct/table column: 8 type constants (BOOL, INT, FLOAT, STRING, DATE, TIME, HEX, NUM)
├── Config/
│   ├── IConfiguration.php # Common SAP connection params + 4 trace levels
│   ├── IConfigTypeA.php   # Direct application server (ashost, sysnr, client, ...)
│   └── IConfigTypeB.php   # Load-balanced via message server (mshost, r3name, group, ...)
├── exceptions/
│   ├── ISapException.php  # Base; extends Throwable
│   └── I*Exception.php    # 6 specialisations (Connection, FunctionCall, InvalidArgument, ...)
└── Util/
    └── IJsonSerializable.php  # Extends JsonSerializable; adds static jsonDecode(string): static
```

**Cross-cutting pattern:** every top-level interface (`IFunction`, `IApi`, `IApiElement`, `IConfiguration`,
`IMember`) extends `IJsonSerializable` — all objects must be round-trippable through JSON.

## Namespace

PSR-4 root `phpsap\interfaces` → `src/`. Subdirectory namespaces (`Api`, `Config`, `exceptions`, `Util`)
map directly to directory names. Exception interfaces live in the lowercase `exceptions/` directory but use
the mixed-case namespace `phpsap\interfaces\exceptions`.

## Developer Workflows

```bash
# Full CI check (validate + lint + phpstan + phpcs)
composer ci

# Individual tools (phpcs.xml already configures PSR12 for src/)
vendor/bin/phpstan analyse --configuration=phpstan.neon
vendor/bin/phpcbf                         # auto-fix first, uses phpcs.xml
vendor/bin/phpcs                          # inspect remaining issues, uses phpcs.xml
php -l src/                               # syntax check only
```

PHPStan runs at **level 9** (strictest). All new code must pass without suppressions.

## Key Conventions

- **Interfaces only** — never add concrete classes or traits to `src/`.
- All type constants are defined as `string` constants directly on the interface
  (e.g. `IValue::TYPE_BOOLEAN`, `IMember::TYPE_DATE`).
- Direction constants on `IApiElement`: `DIRECTION_INPUT`, `DIRECTION_OUTPUT`, `DIRECTION_CHANGING`, `DIRECTION_TABLE`.
- `cast(array $array): array` / `castToArray(mixed $value): array` are the standard conversion methods on
  `IStruct`, `ITable`, and `IMember` — always accept raw RFC output and return PHP-typed arrays.
- Config constants follow the SAP NW RFC SDK parameter naming (e.g. `ASHOST`, `SYSNR`, `MSHOST`, `R3NAME`).
- `.gitattributes` marks development-only files such as `phpcs.xml`, `phpstan.neon`, and `AGENTS.md`
  as `export-ignore`, so release archives are intentionally slimmer than the Git checkout.

