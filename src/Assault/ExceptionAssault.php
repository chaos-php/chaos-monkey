<?php

declare(strict_types=1);

namespace Chaos\Monkey\Assault;

use Chaos\Monkey\Assault;
use Chaos\Monkey\Settings;

class ExceptionAssault implements Assault
{
    private Settings $settings;

    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }

    public function isActive(): bool
    {
        return $this->settings->exceptionActive();
    }

    public function attack(): void
    {
        throw new ($this->settings->exceptionClass())();
    }
}
