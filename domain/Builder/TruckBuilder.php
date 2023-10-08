<?php

namespace App\Builder;

use App\Entity\Cars\Truck;
use App\Exception\WrongCarBuildParametersException;

class TruckBuilder extends BaseCarBuilder
{
    /**
     * @throws WrongCarBuildParametersException
     */
    public function run(): Truck
    {
        $truck = $this->create();

        if (!$this->isValidBodyWhl()) {
            throw new WrongCarBuildParametersException();
        }

        $chunkBodyWhl = explode('x', $this->dto->getBodyWhl());

        $truck->setBodyLength((float)($chunkBodyWhl[0] ?? 0));
        $truck->setBodyWidth((float)($chunkBodyWhl[1] ?? 0));
        $truck->setBodyHeight((float)($chunkBodyWhl[2] ?? 0));

        return $truck;
    }

    /**
     * @throws WrongCarBuildParametersException
     */
    private function create(): Truck
    {
        return $this->createBaseCar(new Truck());
    }

    private function isValidBodyWhl(): bool
    {
        $pattern = '/^(\d+(\.\d+)?x){2}\d+(\.\d+)?$/';
        $bodyWhl = $this->dto->getBodyWhl();

        return preg_match($pattern, $bodyWhl) || $bodyWhl === '';
    }
}