<?php

namespace App\Weather;

use App\GoogleApi\WeatherService;
use App\Model\Weather;
use Symfony\Component\Cache\Simple\FilesystemCache;

class LoaderService
{
    /** @var WeatherService */
    private $weatherService;

    /** @var FilesystemCache */
    private $cacheService;

    /**
     * LoaderService constructor.
     * @param WeatherService $weatherService
     */
    public function __construct(WeatherService $weatherService, FilesystemCache $cacheService)
    {
        $this->weatherService = $weatherService;
        $this->cacheService = $cacheService;
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
