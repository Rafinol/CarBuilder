<?php

namespace App\Entity\Cars;

final class Car extends BaseCar
{
    /** @psalm-suppress UnusedProperty */
    private int $passengerSeatsCount;

    public function setPassengerSeatsCount(int $passengerSeatsCount): void
    {
        $this->passengerSeatsCount = $passengerSeatsCount;
    }

    public function getPassengerSeatsCount(): int
    {
        return $this->passengerSeatsCount;
    }
}
