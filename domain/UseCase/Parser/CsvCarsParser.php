<?php

namespace App\UseCase\Parser;

use App\Dto\CarDto;
use App\Exception\WrongCarBuildParametersException;
use App\Infrastucture\Csv\GetArrayByCsvTask;
use App\UseCase\Factory\CreateCarFactory;

class CsvCarsParser implements CarsParserInterface
{
    public function getCarList(string $filePath): array
    {
        $rawCarsData = GetArrayByCsvTask::run($filePath);

        $carList = $this->getCarsDto($rawCarsData);

        return $this->present($carList);
    }


    private function getCarsDto(array $rawCarsData): array
    {
        $carsDto = [];

        foreach ($rawCarsData as $rawCarData) {
            $carDto = new CarDto();
            $carDto->setCarType($rawCarData[0])
                ->setBrand($rawCarData[1])
                ->setPassengerSeatsCount($rawCarData[2])
                ->setPhotoFileName($rawCarData[3])
                ->setBodyWhl($rawCarData[4])
                ->setCarrying($rawCarData[5])
                ->setExtra($rawCarData[6]);

            $carsDto[] = $carDto;
        }

        return $carsDto;
    }

    public function present(array $carList): array
    {
        return array_filter(
            array_map(static function ($carDto) {
                try {
                    return (new CreateCarFactory($carDto))->create();
                } catch (WrongCarBuildParametersException) {
                    return null;
                }
            }, $carList)
        );
    }
}
