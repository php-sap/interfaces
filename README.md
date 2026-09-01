# PHP/SAP interfaces

[![License: MIT][license-mit]](LICENSE)

This repository defines interfaces for implementing the [PHP/SAP][phpsap] API.

## Development

All development commands (install, lint, analyze, beautify, sniff, audit, validate)
run via Docker through the `Makefile`, so no local PHP installation is needed. Run
`make help` to list all targets. Most targets require `PHP_VERSION`, e.g.:

```sh
make install PHP_VERSION=8.1
```

[phpsap]: https://php-sap.github.io
[license-mit]: https://img.shields.io/badge/license-MIT-blue.svg
