<?php

namespace App\AgeCalculator;


class AgeCalculator
{
    public function getAge(\DateTime $birthDate) : int
    {
        $now = new \DateTime('now');
        
        $dateDiff = date_diff($now, $birthDate);
        
        return $dateDiff->y;
    }

}