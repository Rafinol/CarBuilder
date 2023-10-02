<?php
namespace App\Entity\Cars;
abstract class BaseCar
{
    protected string $carType;
    protected string $photoFileName;
    protected string $brand;
    protected float $carrying; // грузоподъемность

    public function getPhotoFileExt(): string
    {
        $photoFileNameChunks = explode('.', $this->photoFileName);

        // todo:: переделать
        return '.' . end($photoFileNameChunks);
    }

    final public function setCarType(string $type): void
    {
        $this->carType = $type;
    }
    final public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }
    final public function setCarrying(string $carrying): void
    {
        $this->carrying = $carrying;
    }
}