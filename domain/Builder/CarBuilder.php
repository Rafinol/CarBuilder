<?php

namespace App\Builder;

use App\Entity\Cars\Car;
use App\Exception\WrongCarBuildParametersException;

class CarBuilder extends BaseCarBuilder
{
    public function run(): Car
    {
        $car = $this->create();
        $car->setPassengerSeatsCount((int)$this->dto->getPassengerSeatsCount());

        return $car;
    }

    /**
     * @throws WrongCarBuildParametersException
     */
    private function create(): Car
    {
        return $this->createBaseCar(new Car());
    }
}
