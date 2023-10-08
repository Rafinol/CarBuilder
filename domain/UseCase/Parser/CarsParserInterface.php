<?php

namespace App\UseCase\Parser;

interface CarsParserInterface
{
    public function getCarList(string $filePath): array;
}
