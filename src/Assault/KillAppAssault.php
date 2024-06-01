<?php

declare(strict_types=1);

namespace Chaos\Monkey\Assault;

use Chaos\Monkey\Assault;
use Chaos\Monkey\Settings;

class KillAppAssault implements Assault
{
    public function __construct(private readonly Settings $settings)
    {
    }

    public function isActive(): bool
    {
        return $this->settings->killAppActive();
    }

    public function attack(): void
    {
        // cheers :D
        exit;
    }
}
