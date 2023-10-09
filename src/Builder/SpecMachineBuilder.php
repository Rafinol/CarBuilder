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
        $this->validate();

        /** @var $specMachine SpecMachine */
        $specMachine = $this->createBaseCar(new SpecMachine());
        $specMachine->setExtra($this->dto->getExtra());

        return $specMachine;
    }

    protected function validate(): void
    {
        parent::validate();
        if (empty($this->dto->getExtra())) {
            throw new WrongCarBuildParametersException();
        }
    }
}
