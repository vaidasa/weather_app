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

    public function adultOrNot(string $birthDateString)
    {
        $birthDate = new \DateTime($birthDateString);
        
        $age = $this->ageCalculator->getAge($birthDate);
       
        $growthStage = $this->growthTeller->getGrowthStage($age);
        
        return $growthStage;
        
    }
    
}