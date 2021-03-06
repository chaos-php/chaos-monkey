<?php

declare(strict_types=1);

namespace Chaos\Monkey;

interface Assault
{
    public function isActive(): bool;

    public function attack(): void;
}
