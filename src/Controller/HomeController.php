<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{

    /**
     * @Route("/test", name="test")
     */
    public function test()
    {
        $now = new \DateTime('now');
        $birth = new \DateTime('1981-11-20');
        
        $diff = date_diff($now, $birth);
        
        var_dump($diff->y); die;
    }
    
    
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
