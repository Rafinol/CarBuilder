<?php

namespace App\Infrastucture\Csv;

class GetArrayByCsvTask
{
    public static function run(string $filePath): array
    {
        $file = fopen($filePath, 'rb');
        $csvData = [];

        while (($row = fgetcsv($file, separator: ';')) !== false) {
            $csvData[] = $row;
        }

        fclose($file);

        return $csvData;
    }
}