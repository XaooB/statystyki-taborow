<?php

namespace App\Controller;

use App\Entity\Institution;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends BaseController
{
    public function index()
    {
//        $tokenStorage = $this->get('security.token_storage');
//        $user = $tokenStorage->getToken()->getUser();

        $institutions = $this->getEntity(Institution::class)->findAll();


        return $this->render('index.html.twig', [
            'heading' => 'Statystyki Taborowe',
            'institutions' => $institutions
        ]);
    }
}