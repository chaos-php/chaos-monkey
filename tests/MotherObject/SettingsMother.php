<?php

declare(strict_types=1);

namespace Chaos\Monkey\Tests\MotherObject;

use Chaos\Monkey\Settings;

class SettingsMother
{
    public static function withActiveLatency(int $minMs, int $maxMs): Settings
    {
        $settings = new Settings();
        $settings->setLatencyActive(true);
        $settings->setLatencyMinMs($minMs);
        $settings->setLatencyMaxMs($maxMs);
        $settings->setProbability(100);

        return $settings;
    }

    public static function withExceptionActive(string $exceptionClass): Settings
    {
        $settings = new Settings();
        $settings->setExceptionActive(true);
        $settings->setExceptionClass($exceptionClass);
        $settings->setProbability(100);

        return $settings;
    }

    public static function withKillAppActive(): Settings
    {
        $settings = new Settings();
        $settings->setKillAppActive(true);
        $settings->setProbability(100);

        return $settings;
    }

    public static function withMemoryActive(float $memoryFillTargetFraction): Settings
    {
        $settings = new Settings();
        $settings->setMemoryActive(true);
        $settings->setMemoryFillTargetFraction($memoryFillTargetFraction);
        $settings->setProbability(100);

        return $settings;
    }
}
