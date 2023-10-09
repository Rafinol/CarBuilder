<?php

namespace Tests;

use App\Dto\CarDto;
use App\Exception\WrongCarBuildParametersException;
use App\UseCase\Factory\CreateCarFactory;
use PHPUnit\Framework\TestCase;

abstract class BaseCarsCreate extends TestCase
{
    public function test_should_return_exception_without_brand_value(): void
    {
        $carDto = $this
            ->getCorrectCarDto()
            ->setBrand('');

        $this->assertExceptionByCarDto($carDto);
    }

    public function test_should_return_exception_without_photo_value(): void
    {
        $carDto = $this
            ->getCorrectCarDto()
            ->setPhotoFileName('');

        $this->assertExceptionByCarDto($carDto);
    }

    public function test_should_return_exception_without_carrying(): void
    {
        $carDto = $this
            ->getCorrectCarDto()
            ->setCarrying('');

        $this->assertExceptionByCarDto($carDto);
    }

    public function test_should_return_exception_without_car_type(): void
    {
        $carDto = $this
            ->getCorrectCarDto()
            ->setCarType('');

        $this->assertExceptionByCarDto($carDto);
    }

    public function test_should_return_exceptions_due_invalid_carrying(): void
    {
        $carDto = $this
            ->getCorrectCarDto()
            ->setCarrying('двести');

        $this->assertExceptionByCarDto($carDto);
    }

    protected function assertExceptionByCarDto(CarDto $carDto): void
    {
        $this->expectException(WrongCarBuildParametersException::class);

        (new CreateCarFactory($carDto))->create();
    }

    abstract protected function getCorrectCarDto(): CarDto;
}