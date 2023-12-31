<?php

namespace App\Entity\Cars;

final class SpecMachine extends BaseCar
{
    /** @psalm-suppress UnusedProperty */
    private string $extra;

    public function setExtra(string $extra): void
    {
        $this->extra = $extra;
    }

    /** @psalm-suppress UnusedMethod */
    public function getExtra(): string
    {
        return $this->extra;
    }
}
