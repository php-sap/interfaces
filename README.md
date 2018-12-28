# PHP/SAP interfaces

**ATTENTION: THIS IS WORK IN PROGRESS AND NOT TO BE USED UNTIL THIS MESSAGE DISAPPEARS!**

[![License: MIT][license-mit]](LICENSE)

This repository defines interfaces for implementing the [PHP/SAP][phpsap] API.

## Interfaces

The following interfaces are available in namespace `phpsap\interfaces`:

* `IConfig` Configure basic connection parameters for SAP remote function calls, that are common to both connection types (A, and B).
* `IConfigA` Configure connection parameters for SAP remote function calls using a specific SAP application server (type A).
* `IConfigB` Configure connection parameters for SAP remote function calls using load balancing (type B).
* `IConnection` Manage a PHP/SAP connection instance.
* `IFunction` Manage a PHP/SAP remote function call.
* `ISapException` Generic SAP exception.
* `IConnectionFailedException` The SAP connection failed.
* `IUnknownFunctionException` The requested remote function could not be found.
* `IFunctionCallException` The SAP remote function call failed.

[phpsap]: https://php-sap.github.io
[license-mit]: https://img.shields.io/badge/license-MIT-blue.svg
