<?php

namespace App\Entity\Cars;

final class SpecMachine extends BaseCar
{
    private string $extra;

    public function setExtra(string $extra): void
    {
        $this->extra = $extra;
    }
}