<?php

declare(strict_types=1);

namespace Chaos\Monkey\Tests\Assault;

use Chaos\Monkey\Assault\KillAppAssault;
use Chaos\Monkey\Tests\MotherObject\SettingsMother;
use PHPUnit\Framework\TestCase;

final class KillAppAssaultTest extends TestCase
{
    public function testKillAppAssaultActive(): void
    {
        $assault = new KillAppAssault(SettingsMother::withKillAppActive());

        self::assertTrue($assault->isActive());
    }
}
