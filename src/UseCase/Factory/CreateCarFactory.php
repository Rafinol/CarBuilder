<?php

namespace App\UseCase\Factory;

use App\Builder\CarBuilder;
use App\Builder\SpecMachineBuilder;
use App\Builder\TruckBuilder;
use App\Dto\CarDto;
use App\Entity\Cars\Car;
use App\Entity\Cars\CarType;
use App\Entity\Cars\SpecMachine;
use App\Entity\Cars\Truck;
use App\Exception\WrongCarBuildParametersException;
use DomainException;

readonly class CreateCarFactory
{
    public function __construct(private CarDto $dto)
    {
    }

    /**
     * @throws WrongCarBuildParametersException
     */
    public function create(): Car|Truck|SpecMachine
    {
        return match ($this->dto->getCarType()) {
            CarType::car->name => (new CarBuilder($this->dto))->run(),
            CarType::truck->name => (new TruckBuilder($this->dto))->run(),
            CarType::specMachine->name => (new SpecMachineBuilder($this->dto))->run(),
            default => throw new WrongCarBuildParametersException('Не найден тип ' . $this->dto->getCarType()),
        };
    }
}
