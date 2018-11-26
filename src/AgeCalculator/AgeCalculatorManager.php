<?php

namespace App\AgeCalculator;


class AgeCalculatorManager
{

    private $ageCalculator;
    private $growthTeller;

    /**
     * AgeCalculatorManager constructor.
     */
    public function __construct(AgeCalculator $ageCalculator, GrowthTeller $growthTeller)
    {
        $this->ageCalculator = $ageCalculator;
        $this->growthTeller = $growthTeller;
    }

    public function getAge(string $birthDateString)
    {
        return $this->ageCalculator->getAge( new \DateTime($birthDateString));
    }

    public function isAdult(int $age) : bool
    {
        $adult = $this->growthTeller->isAdult($age);
        
        return $adult;
    }
}