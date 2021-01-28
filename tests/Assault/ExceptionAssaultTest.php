<?php

declare(strict_types=1);

namespace Chaos\Monkey\Tests\Assault;

use Chaos\Monkey\Assault\ExceptionAssault;
use Chaos\Monkey\Tests\MotherObject\SettingsMother;
use PHPUnit\Framework\TestCase;

class ExceptionAssaultTest extends TestCase
{
    public function testExceptionAssault(): void
    {
        $exceptionClass = \LogicException::class;

        $assault = new ExceptionAssault(SettingsMother::withExceptionActive($exceptionClass));

        self::expectException($exceptionClass);
        $assault->attack();
    }
}
