# AGENTS.md

## Project Overview

Pure PHP interfaces library for [PHP/SAP](https://php-sap.github.io) — a contract-only package that consuming
implementations must satisfy to call SAP RFC (Remote Function Call) functions. **No concrete classes exist here.**

## Ecosystem

[PHP/SAP](https://php-sap.github.io) is split across five focused repositories that build on
each other instead of one monolithic package:

| Repository                  | Role                                                                                                 | Depends on (`composer.json`)                        |
|------------------------------|-------------------------------------------------------------------------------------------------------|-------------------------------------------------------|
| `php-sap/interfaces`         | Contract-only interfaces (`IApi`, `IConfiguration`, `IFunction`, exceptions). No concrete classes.    | —                                                       |
| `php-sap/datetime`           | SAP date/time format support on top of native `DateTime`/`DateInterval`.                             | —                                                       |
| `php-sap/common`             | Generic abstract classes, API/config value objects, and exceptions implementing `interfaces`.        | `interfaces`, `datetime`                                |
| `php-sap/integration-tests`  | Shared abstract PHPUnit test infrastructure and SAP module mocks reused by concrete connector packages. | `interfaces`, `common`, `datetime`                    |
| `php-sap/saprfc-kralik`      | Concrete adapter for Gregor Kralik's `ext-sapnwrfc` extension.                                        | `interfaces`, `common` (+ `integration-tests` for tests only) |

**→ You are here: `php-sap/interfaces`** — the contracts every other package implements or consumes.

This package only defines contracts; it has no dependencies of its own. Default/generic
implementations of these interfaces belong in `php-sap/common`, not here.

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

### Namespace

PSR-4 root `phpsap\interfaces` → `src/`. Subdirectory namespaces (`Api`, `Config`, `exceptions`, `Util`)
map directly to directory names. Exception interfaces live in the lowercase `exceptions/` directory but use
the mixed-case namespace `phpsap\interfaces\exceptions`.

## Developer Workflows

All commands run inside official PHP Docker images so the host machine does not need a
local PHP installation. Use PHP 8.1, 8.2, and 8.3 (matching the CI matrix in
`.github/workflows/main.yml`) for anything version-sensitive (PHPStan, PHP lint).
If you are behind a proxy, forward `HTTP_PROXY`/`HTTPS_PROXY`/`NO_PROXY` into the
container whenever the command needs network access (e.g. `composer install`).

```bash
# Install/update dependencies (needs network access -> forward proxy settings)
docker run --rm --init --interactive --tty \
  --user "$(id -u)":"$(id -g)" \
  --env HTTP_PROXY --env HTTPS_PROXY --env NO_PROXY \
  --volume "$(pwd)":/app --workdir /app \
  composer:2 install

# Full CI check: validate + lint + phpstan + phpcs (no network access needed)
docker run --rm --init \
  --user "$(id -u)":"$(id -g)" \
  --volume "$(pwd)":/app --workdir /app \
  php:8.1-cli composer ci

# Fix code style (run first, no network access needed)
docker run --rm --init \
  --user "$(id -u)":"$(id -g)" \
  --volume "$(pwd)":/app --workdir /app \
  php:8.1-cli php vendor/bin/phpcbf

# Check remaining style issues (no network access needed)
docker run --rm --init \
  --user "$(id -u)":"$(id -g)" \
  --volume "$(pwd)":/app --workdir /app \
  php:8.1-cli php vendor/bin/phpcs

# Run static analysis for every supported PHP version (no network access needed;
# --memory-limit=-1 works around the image's low default memory_limit)
for PHP_VERSION in 8.1 8.2 8.3; do
  docker run --rm --init \
    --user "$(id -u)":"$(id -g)" \
    --volume "$(pwd)":/app --workdir /app \
    "php:${PHP_VERSION}-cli" php vendor/bin/phpstan analyse --configuration=phpstan.neon --memory-limit=-1
done
```

PHPStan runs at **level 9** (strictest). All new code must pass without suppressions.

## Conventions

- **Interfaces only** — never add concrete classes or traits to `src/`.
- All type constants are defined as `string` constants directly on the interface
  (e.g. `IValue::TYPE_BOOLEAN`, `IMember::TYPE_DATE`).
- Direction constants on `IApiElement`: `DIRECTION_INPUT`, `DIRECTION_OUTPUT`, `DIRECTION_CHANGING`, `DIRECTION_TABLE`.
- `cast(array $array): array` / `castToArray(mixed $value): array` are the standard conversion methods on
  `IStruct`, `ITable`, and `IMember` — always accept raw RFC output and return PHP-typed arrays.
- Config constants follow the SAP NW RFC SDK parameter naming (e.g. `ASHOST`, `SYSNR`, `MSHOST`, `R3NAME`).
- `.gitattributes` marks development-only files such as `phpcs.xml`, `phpstan.neon`, and `AGENTS.md`
  as `export-ignore`, so release archives are intentionally slimmer than the Git checkout.

## Safe Change Strategy for Agents

- Never add a concrete class, trait, or default method body to `src/` — this package is
  contracts only; defaults belong in `php-sap/common`.
- Before adding or renaming a constant/method on an interface, check `php-sap/common` for
  every class implementing it — a breaking interface change ripples into every consumer repo.
- Keep new code PHPStan level 9 clean; do not add suppressions to work around this.
- Write documentation, comments, and new code in English to match the repository style.

