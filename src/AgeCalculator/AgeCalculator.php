<?php

namespace App\AgeCalculator;


class AgeCalculator
{

    public function getAge(\DateTime $birthDate)
    {
        $now = new \DateTime('now');
        
        $timeDiff = $now - $birthDate;
        
        return $timeDiff;
        
    }

}