## Persian National Code Validator
A simple class to validate national codes in Iran. 

## Install
Via Composer
```php
$ composer 
```
## Usage
Instantiate the class 
```php
$mobile = Mobile::make('0912000000');
```

Returns Boolean
```php
$mobile->isValid();
```
 

Returns Boolean
```php
$mobile->notValid(); 
```
Retruns Boolean
```php
$moile->isIrancell(); 
```
Reruns the operator for the number
```php
$mobile->operator(); 
```
If it's Hamrah aval, it returns the province for it. like Tehran, Isfahan ...
```php
$mobile->province(); 
```
If mobile is valid returns nothing but if it's not valid Exception is thrown!
```php
$mobile->validate();
```
***

**License**
This library is released under the [MIT license](https://github.com/symfony/polyfill-mbstring/blob/master/LICENSE).

