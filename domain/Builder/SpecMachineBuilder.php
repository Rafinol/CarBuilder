<?php

namespace App\Builder;

use App\Entity\Cars\SpecMachine;
use App\Exception\WrongCarBuildParametersException;

class SpecMachineBuilder extends BaseCarBuilder
{
    /**
     * @throws WrongCarBuildParametersException
     */
    public function run(): SpecMachine
    {
        $specMachine = $this->create();
        $specMachine->setExtra($this->dto->getExtra());

        return $specMachine;
    }

    /**
     * @throws WrongCarBuildParametersException
     */
    private function create(): SpecMachine
    {
        return $this->createBaseCar(new SpecMachine());
    }
}
