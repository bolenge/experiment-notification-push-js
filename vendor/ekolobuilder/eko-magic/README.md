# Eko-Magic

This library is a component of `Ekolo Builder`. It allows to use the magic methods of php to create magic methods and attributes.

## Installation

To install it you must have already dialed installed. If this is not the case go to [Composer](https://getcomposer.org/)

`` bash
$composer require ekolo/eko-magic
`` ``

## API

This library contains two 2 classes, `Magic` and` ParameterBag` the last one inherits the other.

* `Magic` allows to generate magic methods and attributes automatically
* `ParameterBag` allows to add, modify, delete and retrieve values ​​of variables

Example
`` php
<? php
    require __DIR __. '/vendor/autoload.php';

    use Ekolo \ Component \ EkoMagic \ ParameterBag;

    $parameters = new ParameterBag([
        'id' => '1',
        'name' => 'Etokila',
        'first name' => 'Diani',
        'sex' => 'M'
    ]);

    echo $parameters->name(); //Etokila
`` ``

### ParameterBag :: add(array $parameters = [])

Allows you to add variables

`$parameters` The variables to add

`` php
$parameters->add([
    'profession' => 'Doctor',
    'age' => 'adult'
])

echo $parameters->age(); //adult
`` ``

### ParameterBag :: get($key)

Used to return the value of a variable

`$key` The name of the variable to call

`` php
echo $parameters->get('firstname'); //Diani
`` ``

### ParameterBag :: get($key, $default = null)

Used to return the value of a variable

`$key`: This is the name of the key of the variable to retrieve
`$default`: This is the default value in case this variable does not exist

`` php
echo $parameters->get('firstname'); //Diani
`` ``

### ParameterBag :: set($key, $value)

Allows you to modify or create a new variable

`$key` The name of the key of the variable to create or modify
`$value` The value to update

`` php
echo $parameters->get('firstname'); //Diani
`` ``

### ParameterBag :: all()

Return all variables

`` php
print_r($parameters->all());
/*
    Array
   (
        [id] => 1
        [name] => Etokila
        [first name] => Diani
        [sex] => M
        [proffession] => Doctor
        [age] => adult
    )
*/
`` ``

### ParameterBag :: keys()

Return all variable keys

`` php
print_r($parameters->keys());
/*
    Array
   (
        [0] => id
        [1] => name
        [2] => first name
        [3] => sex
        [4] => proffession
        [5] => age
    )
*/
`` ``

### ParameterBag :: replace(array $parameters = [])

Replaces the old array containing variables with a new one

`$parameters` The array of new parameters to replace

`` php
$parameters->replace([
    'id' => '2'
    'name' => 'Isao',
    'firstname' => 'Obed Sara Tabitha'
])
`` ``

### ParameterBag :: has($key)

Checks if the variable whose key passed in parameter exists

`$key` The name of the variable in question

`` php
echo $parameters->has('name')? "'name' exists": "Does not exist"; //'name' exists
`` ``

### ParameterBag :: remove($key)

Removes the variable passed in parameter

`$key` The name of the variable in question

`` php
$parameters->remove('firstname');
echo $parameters->has('firstname')? "'name' exists": "Does not exist"; //Does not exist
`` ``

### ParameterBag :: count()

Returns the number of variables

`` php
$parameters->count(); //3
`` ``

### ParameterBag :: generateAttributes()

It is a `private` method which allows to generate magic attributes automatically.

> Be careful for the keys which have a hyphen `-`, there the generator of attributes and methods does not support them, because of the cost these values ​​can only be retrieved by` get('User-agent') `or` params('user-name') `or` body('still-here') '' and so on