<?php

declare(strict_types=1);

namespace Chaos\Monkey\Tests\Assault;

use Chaos\Monkey\Assault\LatencyAssault;
use Chaos\Monkey\Tests\MotherObject\SettingsMother;
use PHPUnit\Framework\TestCase;

final class LatencyAssaultTest extends TestCase
{
    public function testLatencyAttack(): void
    {
        $latencyMinMs = 5;
        $latencyMaxMs = 10;

        $assault = new LatencyAssault(SettingsMother::withActiveLatency($latencyMinMs, $latencyMaxMs));

        $start = microtime(true);
        $assault->attack();
        $durationMs = (microtime(true) - $start) * 1000;

        self::assertGreaterThanOrEqual($latencyMinMs, $durationMs);
        self::assertLessThanOrEqual($latencyMaxMs + 1, $durationMs);
    }
}
