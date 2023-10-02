<?php

namespace App\UseCase\Parser;

use App\Dto\CarDto;
use App\Infrastucture\Csv\GetArrayByCsvTask;
use App\UseCase\Factory\CreateCarFactory;

class CsvCarsParser implements CarsParserInterface
{
    public function getCarList(string $filePath): array
    {
        $rawCarsData = GetArrayByCsvTask::run($filePath);
        $rawCarsData = $this->removeEmptyRows($rawCarsData);
        $this->removeTitles($rawCarsData);

        $carsDto = $this->getCarsDto($rawCarsData);

        return $this->presentCars($carsDto);

    }

    private function removeTitles(&$rawCarsData): void
    {
        // Удалим первую строчку, т.к. это заголовки
        unset($rawCarsData[0]);
    }
    private function removeEmptyRows($rawCarsData): array
    {
        return array_values(
            array_filter($rawCarsData, static function($rawCarData) {
                return !empty(array_filter($rawCarData));
            })
        );
    }

    private function getCarsDto(array $rawCarsData): array
    {
        $carsDto = [];

        foreach ($rawCarsData as $rawCarData)
        {
            $carDto = new CarDto();
            $carDto->car_type = $rawCarData[0];
            $carDto->brand = $rawCarData[1];
            $carDto->passenger_seats_count = $rawCarData[2];
            $carDto->photo_file_name = $rawCarData[3];
            $carDto->body_whl = $rawCarData[4];
            $carDto->carrying = $rawCarData[5];
            $carDto->extra = $rawCarData[6];

            $carsDto[] = $carDto;
        }

        return $carsDto;
    }

    /**
     * Преобразует массив DTO автомобилей в массив объектов Car.
     */
    private function presentCars(array $carsDto): array
    {
        return array_map(
            static fn($carDto) => (new CreateCarFactory($carDto))->create(),
            $carsDto
        );
    }

}