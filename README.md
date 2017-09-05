![Logo of the project](http://vps56132.vps.ovh.ca/logo.gitHub.png)
# lib-helper-array
> A helper in [emeraldinspiration](https://github.com/emeraldinspirations)'s [library](https://github.com/emeraldinspirations/library).

The goal of this project is to hold commonly used functions that assist in
manipulating base PHP datatypes.

## Installing / Getting started

This project has no dependencies, so can simply be required with
[composer](https://getcomposer.org/)

```shell
composer require emeraldinspirations/lib-helper-array
```

## Features

- [mapElementFunction](#example---mapelementfunction) - Do an `array_map` using
a function inside the array elements

### Example - mapElementFunction

```php
<?php

use emeraldinspirations\library\helper\phpArray\PhpArray;

class DummyObject
{
    public function test(...$Append)
    {
        return $Char . implode('', $Append);
    }
    public function __construct($Char)
    {
        $this->Char = $Char;
    }
}

$Array = [
    new DummyObject('A'),
    new DummyObject('B'),
    new DummyObject('C'),
];

PhpArray::mapElementFunction('Test', $Array, 1, 2, 3);
// Returns: ['A123', 'B123', 'C123']
```

## Contributing

I hope to expand this class to include other functions.  If you'd like to
contribute, please fork the repository and use a feature branch.  I am new to
gitHub and am eager to receive a Pull request to learn how it is done.

I am also open to feedback about how well I am being compliant with standards
and "best practices."  I have written software solo for years, and am trying to
learn how to work better with others.

## Licensing

The code in this project is licensed under [MIT license](LICENSE).
