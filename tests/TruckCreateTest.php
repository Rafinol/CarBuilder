<?php

namespace Tests;

use App\Dto\CarDto;
use App\Entity\Cars\Truck;
use App\Exception\WrongCarBuildParametersException;
use App\UseCase\Factory\CreateCarFactory;

class TruckCreateTest extends BaseCarsCreate
{
    /**
     * @throws WrongCarBuildParametersException
     */
    public function test_should_return_correct_truck_object(): void
    {
        $carDto = $this->getCorrectCarDto();

        $truck = (new CreateCarFactory($carDto))->create();

        $this->assertInstanceOf(Truck::class, $truck);
        $this->assertEquals('Scania', $truck->getBrand());
        $this->assertEquals(20.1, $truck->getCarrying());
        $this->assertEquals('', $truck->getPhotoFileExt());
        $this->assertEquals(number_format(8.1 * 3 * 2.3, 2), $truck->getBodyVolume());
    }

    /**
     * @throws WrongCarBuildParametersException
     */
    public function test_should_return_correct_truck_object_without_volume(): void
    {
        $carDto = $this
            ->getCorrectCarDto()
            ->setBodyWhl('');

        $truck = (new CreateCarFactory($carDto))->create();

        $this->assertEquals(0, $truck->getBodyVolume());
    }

    public function test_should_return_exceptions_due_invalid_volumes(): void
    {
        $carDto = $this
            ->getCorrectCarDto()
            ->setBodyWhl('40x80');

        $this->expectException(WrongCarBuildParametersException::class);

        (new CreateCarFactory($carDto))->create();
    }

    protected function getCorrectCarDto(): CarDto
    {
        return (new CarDto())
            ->setCarType('truck')
            ->setBrand('Scania')
            ->setPhotoFileName('scania')
            ->setCarrying('20.1')
            ->setBodyWhl('8.1x3x2.3');
    }
}