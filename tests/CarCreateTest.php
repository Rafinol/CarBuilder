<?php

namespace Tests;

use App\Dto\CarDto;
use App\Entity\Cars\Car;
use App\Entity\Cars\CarType;
use App\Exception\WrongCarBuildParametersException;
use App\UseCase\Factory\CreateCarFactory;
use PHPUnit\Framework\TestCase;

class CarCreateTest extends BaseCarsCreate
{
    /**
     * @throws WrongCarBuildParametersException
     */
    public function test_should_return_correct_car_object(): void
    {
        $carDto = $this->getCorrectCarDto();

        $car = (new CreateCarFactory($carDto))->create();

        $this->assertInstanceOf(Car::class, $car);
        $this->assertEquals('Toyota Camry', $car->getBrand());
        $this->assertEquals(2.1, $car->getCarrying());
        $this->assertEquals('jpg', $car->getPhotoFileExt());
        $this->assertEquals(5, $car->getPassengerSeatsCount());
        $this->assertEquals(CarType::car, $car->getCarType());
    }

    public function test_should_return_exceptions_due_invalid_passengerSeats(): void
    {
        $carDto = $this
            ->getCorrectCarDto()
            ->setPassengerSeatsCount('четыре.');

        $this->assertExceptionByCarDto($carDto);
    }

    public function test_should_return_exceptions_due_invalid_car_type(): void
    {
        $carDto = $this
            ->getCorrectCarDto()
            ->setCarType('Car');

        $this->expectException(WrongCarBuildParametersException::class);

        (new CreateCarFactory($carDto))->create();
    }

    protected function getCorrectCarDto(): CarDto
    {
        return (new CarDto())
            ->setCarType('car')
            ->setBrand('Toyota Camry')
            ->setPassengerSeatsCount('5')
            ->setPhotoFileName('camry.jpg')
            ->setCarrying('2.1')
            ->setExtra('Extra Info');
    }
}