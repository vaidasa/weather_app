<?php

namespace App\Weather;

use App\GoogleApi\WeatherService;
use App\Model\Weather;

class LoaderService
{
    /** @var WeatherService */
    private $weatherService;

    /**
     * LoaderService constructor.
     * @param WeatherService $weatherService
     */
    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * @param \DateTime $day
     * @return Weather
     * @throws \Exception
     */
    public function loadWeatherByDay(\DateTime $day): Weather
    {
        return $this->weatherService->getDay($day);
    }
}
