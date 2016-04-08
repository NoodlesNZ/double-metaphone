[![Latest Stable Version](https://img.shields.io/packagist/v/NoodlesNZ/double-metaphone.svg?style=flat-square)](https://packagist.org/packages/NoodlesNZ/double-metaphone)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%205.6-8892BF.svg?style=flat-square)](https://php.net/)
[![Build Status](https://img.shields.io/travis/NoodlesNZ/double-metaphone/master.svg?style=flat-square)](https://travis-ci.org/NoodlesNZ/double-metaphone)

# double-metaphone

This class implements a "sounds like" algorithm developed by Lawrence Philips which he published in the June, 2000 issue of C/C++ Users Journal. Double Metaphone is an improved version of Philips' original Metaphone algorithm.

## Installation

To add this package as a local, per-project dependency to your project, simply add a dependency on `NoodlesNZ/double-metaphone` to your project's `composer.json` file. Here is a minimal example of a `composer.json` file that just defines a dependency on double-metaphone:

    {
        "require": {
            "NoodlesNZ/double-metaphone": "~1.0"
        }
    }

## Usage

```php
$d = new DoubleMetaphone('richard');

echo $d->primary . "\n";
echo $d->secondary . "\n";
```

The code above yields the output below:

    RXRT
    RKRT

