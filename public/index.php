<?php
require dirname(__DIR__).'/vendor/autoload.php';

use App\UseCase\Parser\CsvCarsParser;

$parser = new CsvCarsParser();

$cars = $parser->getCarList(__DIR__ .'/storage/Исходные_данные_для_задания_с_машинами.csv');

//print_r($cars);
try {
    echo json_encode($cars, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    echo 'Ошибка при json_encode';
}