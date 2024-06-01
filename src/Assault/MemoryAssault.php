<?php

declare(strict_types=1);

namespace Chaos\Monkey\Assault;

use Akondas\Runtime;
use Chaos\Monkey\Assault;
use Chaos\Monkey\Settings;

final class MemoryAssault implements Assault
{
    private int $totalMemory;

    /**
     * @var int[][]
     */
    private array $memoryVector;

    public function __construct(private readonly Settings $settings)
    {
        $this->totalMemory = (new Runtime())->totalMemory();
    }

    public function isActive(): bool
    {
        return $this->settings->memoryActive();
    }

    public function attack(): void
    {
        while ($this->fillFraction() < $this->settings->memoryFillTargetFraction()) {
            $this->memoryVector[] = $this->getOneMegabyte();
        }
    }

    /**
     * @return int[][]
     */
    public function memoryVector(): array
    {
        return $this->memoryVector;
    }

    private function fillFraction(): float
    {
        return memory_get_usage(true) / $this->totalMemory;
    }

    /**
     * @return int[]
     */
    private function getOneMegabyte(): array
    {
        $data = [];
        for ($i = 0; $i < 16385; ++$i) {
            $data[] = $i;
        }

        return $data;
    }
}
