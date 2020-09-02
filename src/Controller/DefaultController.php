<?php

namespace App\Controller;

use App\Entity\Vehicle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends BaseController
{
    public function index()
    {
//        $tokenStorage = $this->get('security.token_storage');
//        $user = $tokenStorage->getToken()->getUser();

        $vehicles = $this->getEntity(Vehicle::class)->findAll();


        return $this->render('index.html.twig', [
            'heading' => 'Statystyki Taborowe',
            'vehicles' => $vehicles
        ]);
    }
}