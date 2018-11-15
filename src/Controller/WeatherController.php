<?php

namespace App\Controller;

use App\GoogleApi\WeatherService;
use App\Model\NullWeather;
use App\Validator\DateValidator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class WeatherController extends AbstractController
{
    /**
     * @param $day
     * @return Response
     * @throws \Exception
     */
    public function index($day): Response
    {
        $weather = new NullWeather();
        $validator = new DateValidator();
        try {
            $date = new \DateTime($day);
            if ($validator->isDateValid($date) === true) {
                $fromGoogle = new WeatherService();
                $weather = $fromGoogle->getDay($date);
            }
        } catch (\Exception $e) {
            $validator->setErrorMessage('Blogai įvesta data, formatas turi būti "YYYY-mm-dd" ');
        }

        return $this->render('weather/index.html.twig', [
            'errors'      => $validator->getErrors(),
            'weatherData' => [
                'date'      => $weather->getDate()->format('Y-m-d'),
                'dayTemp'   => $weather->getDayTemp(),
                'nightTemp' => $weather->getNightTemp(),
                'sky'       => $weather->getSky()
            ],
        ]);
    }
}
