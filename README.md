# ONEXCRM Valiper Package

## A simple laravel validation utility helper

## Installation

```shell
composer require onexcrm/valiper
```

### Laravel without auto-discovery:

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
Onex\Valiper\OnexValiperServiceProvider::class,
```

If you want to use the facade to log messages, add this to your facades in app.php:

```php
'OnexValiper'=> Onex\Valiper\Valiper\ValiperClassFacade::class,
```

### How to use?:

```php
$validator = OnexValiper::checkInputValidation($formRequestData, $validationRules, $validationMessages);
dd($validator);
```