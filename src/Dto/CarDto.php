<?php

namespace App\Dto;

class CarDto
{
    private string $carType;
    private string $brand;
    private string $passengerSeatsCount;
    private string $photoFileName;
    private string $bodyWhl;
    private string $carrying;
    private string $extra;

    /**
     * @return string
     */
    public function getCarType(): string
    {
        return $this->carType;
    }

    public function setCarType(string $carType): self
    {
        $this->carType = $carType;

        return $this;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getPassengerSeatsCount(): string
    {
        return $this->passengerSeatsCount;
    }

    public function setPassengerSeatsCount(string $passengerSeatsCount): self
    {
        $this->passengerSeatsCount = $passengerSeatsCount;

        return $this;
    }

    public function getPhotoFileName(): string
    {
        return $this->photoFileName;
    }

    public function setPhotoFileName(string $photoFileName): self
    {
        $this->photoFileName = $photoFileName;

        return $this;
    }

    public function getBodyWhl(): string
    {
        return $this->bodyWhl;
    }

    public function setBodyWhl(string $bodyWhl): self
    {
        $this->bodyWhl = $bodyWhl;

        return $this;
    }

    public function getCarrying(): string
    {
        return $this->carrying;
    }

    public function setCarrying(string $carrying): self
    {
        $this->carrying = $carrying;

        return $this;
    }

    public function getExtra(): string
    {
        return $this->extra;
    }


    public function setExtra(string $extra): self
    {
        $this->extra = $extra;

        return $this;
    }

}
