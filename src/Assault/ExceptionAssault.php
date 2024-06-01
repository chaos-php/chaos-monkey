<?php

declare(strict_types=1);

namespace Chaos\Monkey\Assault;

use Chaos\Monkey\Assault;
use Chaos\Monkey\Settings;

final class ExceptionAssault implements Assault
{
    public function __construct(private readonly Settings $settings)
    {
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
