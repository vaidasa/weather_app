<?php
/**
 * Created by PhpStorm.
 * User: vaidas
 * Date: 18.11.22
 * Time: 18.08
 */

namespace App;


class AgeCalculatorManager {

  public function getDate(string $dateString) {
    $date = new \DateTime($dateString);
    return $date;
  }

  public function isAdult(\DateTime $birthDate) {

    return "Yes, you are adult";
  }

}