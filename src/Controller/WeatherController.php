<?php

namespace App\Controller;

use App\GoogleApi\WeatherService;
use App\Model\NullWeather;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class WeatherController extends AbstractController
{

    /** @var WeatherService */
    private $weatherService;

    /**
     * WeatherController constructor.
     * @param WeatherService $weatherService
     */
    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * @param  $day
     * @return Response
     */
    public function index($day): Response
    {
        try {
            $weather = $this->weatherService->getDay(new \DateTime($day));
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
