<?php

declare(strict_types=1);

namespace Chaos\Monkey\Assault;

use Chaos\Monkey\Assault;
use Chaos\Monkey\Settings;

final class LatencyAssault implements Assault
{
    public function __construct(private readonly Settings $settings)
    {
    }

    public function isActive(): bool
    {
        return $this->settings->latencyActive();
    }

    public function attack(): void
    {
        $latencyMs = \random_int($this->settings->latencyMinMs(), $this->settings->latencyMaxMs());
        usleep($latencyMs * 1000);
    }
}
