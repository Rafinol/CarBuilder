<?php

namespace App\Entity\Cars;

final class Truck extends BaseCar
{
    private float $bodyLength;
    private float $bodyWidth;
    private float $bodyHeight;

    public function getBodyVolume(): float
    {
        return $this->bodyLength * $this->bodyHeight * $this->bodyWidth;
    }

    public function setBodyLength(float $bodyLength): void
    {
        $this->bodyLength = $bodyLength;
    }

    public function setBodyWidth(float $bodyWidth): void
    {
        $this->bodyWidth = $bodyWidth;
    }

    public function setBodyHeight(float $bodyHeight): void
    {
        $this->bodyHeight = $bodyHeight;
    }
}