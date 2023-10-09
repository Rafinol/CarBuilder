<?php

namespace App\Infrastucture\Csv;

class GetArrayByCsvTask
{
    public static function run(string $filePath): array
    {
        $csvData = self::getCsv($filePath);
        $csvData = self::removeEmptyRows($csvData);
        self::removeTitles($csvData);

        return $csvData;
    }

    private static function getCsv(string $filePath): array
    {
        $file = fopen($filePath, 'rb');
        $csvData = [];

        while (($row = fgetcsv($file, separator: ';')) !== false) {
            $csvData[] = $row;
        }

        fclose($file);

        return $csvData;
    }

    private static function removeTitles(array &$csvData): void
    {
        // Удалим первую строчку, т.к. это заголовки
        unset($csvData[0]);
    }

    private static function removeEmptyRows(array $csvData): array
    {
        return array_values(
            array_filter($csvData, static function ($dataRow) {
                return !empty(array_filter($dataRow));
            })
        );
    }
}
