<?php

namespace App\AgeCalculator;


class GrowthTeller
{
    public function getGrowthStage(int $age)
    {
        if ($age > 18)
            return "Adult";
        else 
            return "Kid";
    }
}