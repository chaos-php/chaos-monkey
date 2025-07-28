<?php

declare(strict_types=1);

namespace Chaos\Monkey;

final readonly class ChaosMonkey
{
    /**
     * @var list<Assault>
     */
    private array $assaults;

    /**
     * @param iterable<Assault> $assaults
     */
    public function __construct(iterable $assaults, private Settings $settings)
    {
        $this->assaults = array_values([...$assaults]);
    }

    public function call(): void
    {
        if ($this->isEnable() && $this->isTrouble()) {
            $this->chooseAndRunAttack();
        }
    }

    public function settings(): Settings
    {
        return $this->settings;
    }

    private function isEnable(): bool
    {
        return $this->settings->enabled();
    }

    private function isTrouble(): bool
    {
        return $this->settings->probability() >= \random_int(0, 100);
    }

    private function chooseAndRunAttack(): void
    {
        $assaults = $this->getActiveAssaults();
        if ($assaults === []) {
            return;
        }

        $this->getRandomAssault($assaults)->attack();
    }

    /**
     * @return list<Assault>
     */
    private function getActiveAssaults(): array
    {
        return array_values(array_filter($this->assaults, fn (Assault $assault) => $assault->isActive()));
    }

    /**
     * @param list<Assault> $assaults
     */
    private function getRandomAssault(array $assaults): Assault
    {
        return $assaults[array_rand($assaults)];
    }
}
