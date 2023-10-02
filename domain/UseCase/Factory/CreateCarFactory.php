<?php

namespace App\UseCase\Factory;

use App\Dto\CarDto;
use App\Entity\Cars\BaseCar;
use App\Entity\Cars\Car;
use App\Entity\Cars\CarType;
use App\Entity\Cars\SpecMachine;
use App\Entity\Cars\Truck;

readonly class CreateCarFactory
{
    public function __construct(private CarDto $dto)
    {
    }

    public function create(): BaseCar
    {
        if($this->dto->car_type === CarType::car->name){
            return $this->createCar();
        }
        if($this->dto->car_type === CarType::truck->name){
            return $this->createTruck();
        }
        if($this->dto->car_type === CarType::spec_machine->name){
            return $this->createSpecMachine();
        }

        throw new \DomainException('Не найден тип ' . $this->dto->car_type);
    }

    private function createCar(): Car
    {
        /** @var $car Car */
        $car = $this->createBaseCar(new Car());
        $car->setPassengerSeatsCount((int)$this->dto->passenger_seats_count);

        return $car;
    }

    private function createTruck(): Truck
    {
        /** @var $truck Truck */
        $truck = $this->createBaseCar(new Truck());

        // todo:: проверки на существование
        $chunkBodyWhl = explode('x', $this->dto->body_whl);
        $truck->setBodyLength((float)($chunkBodyWhl[0] ?? 0));
        $truck->setBodyWidth((float)($chunkBodyWhl[1] ?? 0));
        $truck->setBodyHeight((float)($chunkBodyWhl[2] ?? 0));

        return $truck;

    }
    private function createSpecMachine(): SpecMachine
    {
        /** @var $specMachine SpecMachine */
        $specMachine = $this->createBaseCar(new SpecMachine());
        $specMachine->setExtra($this->dto->extra);

        return $specMachine;
    }

    private function createBaseCar(BaseCar $baseCar): BaseCar
    {
        $baseCar->setCarType($this->dto->car_type);
        $baseCar->setBrand($this->dto->brand);
        // todo:: проверить
        $baseCar->setCarrying((float)$this->dto->carrying);

        return $baseCar;
    }
}