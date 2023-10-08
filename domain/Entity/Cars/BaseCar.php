<?php

namespace App\Entity\Cars;

use SplFileInfo;

abstract class BaseCar
{
    protected CarType $carType;
    protected string  $photoFileName;
    protected string  $brand;
    protected float   $carrying;

    public function getPhotoFileExt(): string
    {
        return (new SplFileInfo($this->photoFileName))->getExtension();
    }

    final public function setPhotoFileName(string $photo): void
    {
        $this->photoFileName = $photo;
    }

    final public function setCarType(CarType $type): void
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
