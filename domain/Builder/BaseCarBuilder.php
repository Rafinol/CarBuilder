<?php

namespace App\Builder;

use App\Dto\CarDto;
use App\Entity\Cars\Car;
use App\Entity\Cars\CarType;
use App\Entity\Cars\SpecMachine;
use App\Entity\Cars\Truck;
use App\Exception\WrongCarBuildParametersException;
use DomainException;

abstract class BaseCarBuilder
{
    public function __construct(protected CarDto $dto)
    {
    }

    /**
     * @throws WrongCarBuildParametersException
     */
    protected function createBaseCar(Car|Truck|SpecMachine $baseCar): Car|Truck|SpecMachine
    {
        if (!is_numeric($this->dto->getCarrying())) {
            throw new WrongCarBuildParametersException();
        }
        $baseCar->setCarrying((float)$this->dto->getCarrying());
        $baseCar->setCarType($this->getCarTypeFromDto());
        $baseCar->setBrand($this->dto->getBrand());
        $baseCar->setPhotoFileName($this->dto->getPhotoFileName());
        

        return $baseCar;
    }

    /**
     * @throws WrongCarBuildParametersException
     */
    public function getCarTypeFromDto(): CarType
    {
        return match ($this->dto->getCarType()) {
            'car' => CarType::car,
            'truck' => CarType::truck,
            'specMachine' => CarType::specMachine,
            default => throw new WrongCarBuildParametersException(),
        };
    }
}