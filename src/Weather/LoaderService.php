<?php

namespace App\Weather;

use App\GoogleApi\WeatherService;
use App\Model\Weather;
use Symfony\Component\Cache\Simple\FilesystemCache;

class LoaderService
{

    /** @var WeatherService */
    private $googleWeatherService;

    /** @var FilesystemCache */
    private $cacheService;

    /**
     * LoaderService constructor.
     * @param WeatherService $googleWeatherService
     */
    public function __construct(WeatherService $googleWeatherService, FilesystemCache $cacheService)
    {
        $this->googleWeatherService = $googleWeatherService;
        $this->cacheService = $cacheService;
    }

    /**
     * @param \DateTime $day
     * @return Weather
     * @throws \Exception
     */
    public function loadWeatherByDay(\DateTime $day): Weather
    {
        return $this->googleWeatherService->getDay($day);
    }
}
