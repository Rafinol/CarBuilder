<?php

namespace Tests;

use App\Dto\CarDto;
use App\Entity\Cars\SpecMachine;
use App\Exception\WrongCarBuildParametersException;
use App\UseCase\Factory\CreateCarFactory;

class SpecMachineCreateTest extends BaseCarsCreate
{
    /**
     * @throws WrongCarBuildParametersException
     */
    public function test_should_return_correct_spec_machine_object(): void
    {
        $carDto = $this->getCorrectCarDto();

        $specMachine = (new CreateCarFactory($carDto))->create();

        $this->assertInstanceOf(SpecMachine::class, $specMachine);
        $this->assertEquals('Hitachi', $specMachine->getBrand());
        $this->assertEquals(40, $specMachine->getCarrying());
        $this->assertEquals('png', $specMachine->getPhotoFileExt());
        $this->assertEquals('Манипулятор строительный', $specMachine->getExtra());
    }

    public function test_should_return_exceptions_without_extra(): void
    {
        $carDto = $this
            ->getCorrectCarDto()
            ->setExtra('');

        $this->assertExceptionByCarDto($carDto);
    }

    public function test_should_return_exceptions_due_invalid_car_type(): void
    {
        $carDto = $this
            ->getCorrectCarDto()
            ->setCarType('spec_machine');

        $this->expectException(WrongCarBuildParametersException::class);

        (new CreateCarFactory($carDto))->create();
    }

    protected function getCorrectCarDto(): CarDto
    {
        return (new CarDto())
            ->setCarType('specMachine')
            ->setBrand('Hitachi')
            ->setPhotoFileName('hitachi.png')
            ->setExtra('Манипулятор строительный')
            ->setCarrying('40');
    }
}