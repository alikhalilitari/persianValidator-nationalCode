## Persian National Code Validator
A simple class to validate national codes in Iran. 

## Install
Via Composer
```shell
$ composer require persian-validator/national-code
```
## Usage
Instantiate the class 
```php
$nationalCode = NationalCode::make('123456789');
```

Returns Boolean
```php
$nationalCode->isValid();
```
 

Returns Boolean
```php
$nationalCode->notValid(); 
```

If national code is valid returns nothing but if it's not valid Exception is thrown!
```php
$nationalCode->validate();
```
***

**License**
This library is released under the [MIT license](https://github.com/symfony/polyfill-mbstring/blob/master/LICENSE).

