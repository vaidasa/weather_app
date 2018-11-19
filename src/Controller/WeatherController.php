<?php

namespace App\Controller;

use App\Model\NullWeather;
use App\Weather\LoaderService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class WeatherController extends Controller
{
    /**
     * @param               $day
     * @param LoaderService $weatherLoaderService
     * @return Response
     */
    public function index($day): Response
    {
        $weatherLoaderService = $this->container->get('app.weather.loader_service');
        try {
            $weather = $weatherLoaderService->loadWeatherByDay(new \DateTime($day));
        } catch (\Exception $exp) {
            $weather = new NullWeather();
        }

        return $this->render('weather/index.html.twig', [
            'weatherData' => [
                'date'      => $weather->getDate()->format('Y-m-d'),
                'dayTemp'   => $weather->getDayTemp(),
                'nightTemp' => $weather->getNightTemp(),
                'sky'       => $weather->getSky()
            ],
        ]);
    }
}
