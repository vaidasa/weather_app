<?php

namespace App\AgeCalculator;


class GrowthTeller
{
    public function isAdult(int $age) : bool
    {
        if ($age > 18)
            return true;
        else 
            return false;
    }
}