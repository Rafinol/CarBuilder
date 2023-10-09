<?php

namespace App\Entity\Cars;

use SplFileInfo;

abstract class BaseCar
{
    /** @psalm-suppress UnusedProperty */
    protected CarType $carType;
    protected string  $photoFileName;
    /** @psalm-suppress UnusedProperty */
    protected string $brand;
    /** @psalm-suppress UnusedProperty */
    protected float $carrying;

    /** @psalm-suppress UnusedMethod */
    public function getPhotoFileExt(): string
    {
        return (new SplFileInfo($this->photoFileName))->getExtension();
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getCarType(): CarType
    {
        return $this->carType;
    }

    public function getCarrying(): string
    {
        return $this->carrying;
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
