# ekolobuilder/eko-http

It is a component module of the `Ekolo` framework intended to manage and handle all the processing related to all the requests and the` http` responses.

## Installation

To install it you must have already dialed installed. If not go to [Composer](https://getcomposer.org/)

```bash
$composer require ekolo/eko-http
```

## API

`ekolo/http` contains directories which in turn contain classes to make it easier for developers.

1. `src` Main library directory
    * `Options`: Contains some classes which to manage elements optionally.
        * `Bodies`: Manage the data coming by the` POST` method
        * `Headers`: Manage the headers
        * `Params`: Manage the data received by the` GET` method
        * `Params`: Manage data and server variables` $_SERVER`
    * `Request`: Contains classes which feeds the` Request` class which manages `http` requests
    * `Response`: Contains classes which feeds the` Response` class which manages `http` responses

For more details on these classes it would be better to browse the source code of each class.

### class Request

Handles `http` requests

#### Request::params()

This method allows to retrieve and manipulate the data(variables) sent by the GET method which are generally stored in the super global variable `$_GET`

```php
use Ekolo\Http\Request;

$_GET = [
    'name' => 'Etokila',
    'firstname' => 'Diani',
    'sex' => 'M'
];

$request = new Request;
```

##### Request::params($key)

`$key`: This is the name of the variable to retrieve

```php
use Ekolo\Http\Request;

$_GET = [
    'name' => 'Etokila',
    'firstname' => 'Diani',
    'sex' => 'M'
];

$request = new Request;

echo $request-> params('name'); // Etokila
```

##### Request::params()->key

`key`: This is the name of the variable to retrieve

```php
echo $request-> params()->name; // Etokila
```

##### Request::params()->key()

This is called magic methods if we don't want to retrieve by attributes
* `key`: This is the name of the variable to retrieve

```php
echo $request-> params()->name(); // Etokila
```

##### Request::params()->get($key)

`$key`: This is the name of the variable to retrieve

```php
echo $request-> params()->get('name'); // Etokila
```

##### Request::params()->get($key, $default = null)

* `$key`: This is the name of the variable to retrieve
* `$default`: This is the default value in case this variable does not exist

```php
echo $request-> params()->get('function', 'Teacher'); // Teach on
```

##### Request::params($key, $default)

* `$key`: This is the name of the variable to retrieve
* `$default`: This is the default value in case this variable does not exist

```php
echo $request-> params('grade', 'Doctor'); // Doctor
```

##### Request::params()->all()

Return the array containing all the variables

```php
print_r($request-> params()->all());

/*
    Array
   (
        [name] => Etokila
        [first name] => Diani
        [sex] => M
    )
*/
```

> In short, the `params` is an instance of the` ParameterBag` object which is a class of the `eko-magic` library. For more information go to its [documentation](https://github.com/ekolo-contributing/eko-magic).

#### Request::body()

This method is used to retrieve the data sent by the `POST` method, generally stored in the super global variable` $_POST`.

The use of this method is equal to that of `params`

```php
use Ekolo\Http\Request;

$request = new Request;

$request-> body()->add([
    'name' => 'User',
    'first name' => 'new',
    'email' => 'unknown'
]);

echo $request-> body()->firstname();
```

#### Request::server()

This method is used to retrieve the data from the server, generally stored in the super global variable `$ _SERVER`.

The use of this method is equal to that of `params` and` body`

```php
use Ekolo\Http\Request;

$ request = new Request;

echo $ request-> server()->PROCESSOR_IDENTIFIER);
echo echo $ request-> server()->SCRIPT_NAME();

print_r($ request-server()->all());
/*
Array
(
    [PHP_SELF] => index.php
    [SCRIPT_NAME] => index.php
    [SCRIPT_FILENAME] => index.php
    [PATH_TRANSLATED] => index.php
    [DOCUMENT_ROOT] =>
    [REQUEST_TIME_FLOAT] => 1582292281.2729
    [REQUEST_TIME] => 1582292281
    ...
)
*/
```

#### Request::headers()

This method allows you to retrieve the sent headers.

The use of this method is equal to that of `params` and` body`

```php
use Ekolo\Http\Request;

$ request = new Request;

echo $ request-> headers()->get('User-Agent');

print_r($ request-server()->all());
/*
Array
(
    [PHP_SELF] => index.php
    [SCRIPT_NAME] => index.php
    [SCRIPT_FILENAME] => index.php
    [PATH_TRANSLATED] => index.php
    [DOCUMENT_ROOT] =>
    [REQUEST_TIME_FLOAT] => 1582292281.2729
    [REQUEST_TIME] => 1582292281
    ...
)
*/
```

#### Request::input()

This method is just a synonym for de body

The use of this method is equal to that of `body`

```php
use Ekolo\Http\Request;

$ request = new Request;
$ request-> input()->set('name', 'mbuyu');

echo $ request-> input()->get('name');

print_r($ request-server()->all());
```

> Be careful for the keys which have a hyphen `-`, there the generator of attributes and methods does not support them, because of the cost these values ​​can only be retrieved by` get('User-agent') `or` params('user-name') `or` body('still-here') '' and so on

### class Response

Handles `http` responses

For more details see the source codes in `src/Response`