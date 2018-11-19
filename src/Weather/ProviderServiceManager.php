<?php

namespace App\Weather;

use App\ExternalApi\WeatherServiceInterface;

class ProviderServiceManager
{
    /** @var WeatherServiceInterface[] */
    private $weatherProvider;

    /**
     * @param \DateTime $day
     * @return WeatherServiceInterface
     * @throws \Exception
     */
    public function getWeatherProvider(\DateTime $day): WeatherServiceInterface
    {
        $weekday = $day->format('D');
        if ($weekday === 'Sat' || $weekday === 'Sun') {
            $service = $this->getProviderService('yahoo');
        } else {
            $service = $this->getProviderService('google');
        }

        return $service;
    }

    /**
     * @param string                  $providerName
     * @param WeatherServiceInterface $weatherProviderService
     */
    public function addWeatherProvider($providerName, WeatherServiceInterface $weatherProviderService): void
    {
        $this->weatherProvider[$providerName] = $weatherProviderService;
    }

    /**
     * @param $providerServiceName
     * @return WeatherServiceInterface
     * @throws \Exception
     */
    private function getProviderService($providerServiceName): WeatherServiceInterface
    {
        if (!isset($this->weatherProvider[$providerServiceName])) {
            throw new \RuntimeException('Provider with name: "' . $providerServiceName . 'does not exit');
        }

        return $this->weatherProvider[$providerServiceName];
    }
}
