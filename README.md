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
/**
 * @param  array $formData
 * @param  array $rules
 * @param  array $messages
 * @return void
 */
$validator = OnexValiper::checkInputValidation($formRequestData, $validationRules, $validationMessages);
dd($validator);
```

### Utility helper functions:

>> Pass the $validator from above function in all helper functions as per your requirement

```php
$result = OnexValiper::inputValidationObjectFormat($validator);
dd($result);
```

```php
$result = OnexValiper::inputValidationArrayFormat($validator);
dd($result);
```

```php
$result = OnexValiper::inputValidationJsonResponseFormat($validator);
dd($result);
```

```php
$result = OnexValiper::inputValidationJsonFormat($validator);
dd($result);
```

```php
$result = OnexValiper::inputValidationJsonObjectFormat($validator);
dd($result);
```

```php
$result = OnexValiper::inputValidationKeyValuePairFormat($validator);
dd($result);
```

```php
$result = OnexValiper::inputValidationFirstMessage($validator);
dd($result);
```

Feel free to contact me: Arindam Roy <arindam.roy.developer@gmail.com>
### Thanks