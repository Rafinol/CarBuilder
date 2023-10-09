<?php

namespace App\Builder;

use App\Entity\Cars\Car;
use App\Exception\WrongCarBuildParametersException;

class CarBuilder extends BaseCarBuilder
{
    /**
     * @throws WrongCarBuildParametersException
     */
    public function run(): Car
    {
        $this->validate();

        $car = $this->createBaseCar(new Car());
        $car->setPassengerSeatsCount((int)$this->dto->getPassengerSeatsCount());

        return $car;
    }

    protected function validate(): void
    {
        parent::validate();
        if (!is_numeric($this->dto->getPassengerSeatsCount())) {
            throw new WrongCarBuildParametersException();
        }
    }
}
