<?php

use App\UseCase\Parser\CsvCarsParser;

require dirname(__DIR__) . '/vendor/autoload.php';

$creator = new CsvCarsParser();

$cars = $creator->getCarList(__DIR__ . '/storage/Исходные_данные_для_задания_с_машинами.csv');

print_r($cars);
