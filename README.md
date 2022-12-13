# ChaosMonkey 🐒 for PHP

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.4-8892BF.svg)](https://php.net/)
[![Latest Stable Version](https://poser.pugx.org/chaos-php/chaos-monkey/v/stable?format=flat)](https://packagist.org/packages/chaos-php/chaos-monkey)
![GitHub](https://img.shields.io/github/license/chaos-php/chaos-monkey)

Chaos Monkey for PHP applications. Try to attack your running PHP App.

## Assaults

 - **Latency Assault** - adds a delay randomly from the range (min and max)
 - **Exception Assault** - throws given exception class
 - **Memory Assault** - fill memory until target fraction (95% for example) 
 - **Kill Assault** - no mercy, plain `exit()`

## How to use

The best experience you can get is using ready-made integrations:
 - Symfony: [ChaosMonkeySymfonyBundle](https://github.com/chaos-php/chaos-monkey-symfony-bundle)
 - Laravel: [ChaosMonkeyLaravelPackage](https://github.com/chaos-php/chaos-monkey-laravel-package) (in progress)

If your framework is missing, open an issue or use this package manually:

1. Install with composer:
   ```bash
   composer require chaos-php/chaos-monkey
   ```
2. Create `ChaosMonkey` object
   ```php 
   $settings = new Settings();
   $chaosMonkey = new ChaosMonkey([
      new LatencyAssault($settings),
      new MemoryAssault($settings),
      new ExceptionAssault($settings),
      new KillAppAssault($settings)
   ], $settings);
   ```
3. Configure settings and trigger chaos monkey in the working place of the application:
   ```php
   $settings->setExceptionActive(true);
   $settings->setExceptionClass(\RuntimeException::class);
   $settings->setProbability(100);
   $settings->setEnabled(true);
   
   
   $chaosMonkey->call();
   ```   
4. Watch your app plunge into chaos 🙈🙊🙉 😈

## License

ChaosMonkey is released under the MIT Licence. See the bundled LICENSE file for details.

## Author

[Arkadiusz Kondas](https://twitter.com/ArkadiuszKondas)
