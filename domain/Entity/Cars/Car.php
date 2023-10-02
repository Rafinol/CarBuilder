<?php

namespace App\Entity\Cars;

final class Car extends BaseCar
{
    private int $passengerSeatsCount;

    public function setPassengerSeatsCount(int $passengerSeatsCount): void
    {
        $this->passengerSeatsCount = $passengerSeatsCount;
    }
}