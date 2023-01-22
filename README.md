# Array Util

A simple PHP class that provides a wrapper for common array functions.

## Installation
You can install the package via composer:

```php
composer require edwardalgorist/array-util
```

## Usage

To use the package, you can create a new instance of the ArrayUtil class and pass in an array as the argument:

```php
$data = [1, 2, 3];
$arrayUtil = new \EdwardAlgorist\ArrayUtil\ArrayUtil($data);
```

You can then use the provided methods such as `set`, `get`, `toArray`, `in`, `keyExists`, `map`, and `search`. Additionally, you can also call any array function as a method and it will be executed on the data stored in the ArrayUtil instance.

For example, you can use the `array_filter` function as a method:

```php
$filteredData = $arrayUtil->filter(function($value) {
    return $value > 1;
});
```

## Note

Also, this package utilizes the magic `__call` method to dynamically call array functions by converting the method name to snake case and prefixing it with `array_`. If the function does not exist, it will try to call the function without the prefix. Then, it calls the function with the data stored in the ArrayUtil instance.

For example, calling `$arrayUtil->sort()` will sort the data stored in the $arrayUtil instance.

It also returns the result of the function in a new instance of the ArrayUtil class if the result is an array, otherwise the raw result is returned.

## Support
If you have any issues with the package, please open an issue on Github.

## Contributing
If you would like to contribute to the package, please open a pull request on Github.
