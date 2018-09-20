Symfony common
==============
[![PHP from Packagist](https://img.shields.io/packagist/php-v/symfony/symfony.svg)](https://packagist.org/packages/bacart/symfony-common)
[![Latest Stable Version](https://poser.pugx.org/bacart/symfony-common/v/stable.png)](https://packagist.org/packages/bacart/symfony-common)
[![Total Downloads](https://poser.pugx.org/bacart/symfony-common/downloads.svg)](https://packagist.org/packages/bacart/symfony-common)
[![License](https://poser.pugx.org/bacart/symfony-common/license.svg)](LICENSE)

Allows to create lockable commands in Symfony projects. Also includes aware interfaces and traits.

Installation
------------
##### Using command line:
Run the following command and you will get the latest version by [Packagist][1].

```bash
composer require bacart/symfony-common
```

##### Using composer.json
To use the newest (maybe unstable) version add following into your composer.json:

```json
{
    "require": {
        "bacart/symfony-common": "dev-master"
    }
}
```

Usage example
-------------
Use `AbstractLockableCommand` as parent class for your command.
```php
use Bacart\SymfonyCommon\Command\AbstractLockableCommand;

class SomeCommand extends AbstractLockableCommand
{
    ...
}
```
From now on your command will be able to run only once a time. You can also override a `getLockTtl()` method to set a lock lifetime in seconds (defaults to 60).
If your command execution is too complex and may take more than lock lifetime you can extend it with `EventDispatcher`:
```php
use Bacart\SymfonyCommon\Command\AbstractLockableCommand;
use Bacart\SymfonyCommon\Interfaces\EventDispatcherAwareInterface;

class SomeService implements EventDispatcherAwareInterface
{
    use EventDispatcherAwareTrait;
    
    public function someLongRunningMethod()
    {
        ...
        
        // extend a command lock TTL
        $this->dispatcher->dispatch(AbstractLockableCommand::LOCKABLE_COMMAND_REFRESH_EVENT_NAME);
        
        ...
    }
}
```
All the examples assume that you are using an [autowiring][2].

License
-------
This project is released under the [MIT license](LICENSE).

About
-----
Project development is led by the [Bacart][3] team.

[1]: https://packagist.org/packages/bacart/symfony-common
[2]: https://symfony.com/doc/current/service_container/autowiring.html
[3]: https://github.com/bacart
