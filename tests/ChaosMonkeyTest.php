<?php

declare(strict_types=1);

namespace Chaos\Monkey\Tests;

use Chaos\Monkey\Assault\ExceptionAssault;
use Chaos\Monkey\ChaosMonkey;
use Chaos\Monkey\Tests\MotherObject\SettingsMother;
use PHPUnit\Framework\TestCase;

class ChaosMonkeyTest extends TestCase
{
    public function testDisableEnableChaosMonkey(): void
    {
        $settings = SettingsMother::withExceptionActive(\RuntimeException::class);
        $settings->setEnabled(false);

        $chaosMonkey = new ChaosMonkey([new ExceptionAssault($settings)], $settings);
        $chaosMonkey->call();

        // any assertion to make sure exception not occurred
        self::assertFalse($settings->enabled());

        $settings->setEnabled(true);

        $this->expectException(\RuntimeException::class);

        $chaosMonkey->call();
    }
}
