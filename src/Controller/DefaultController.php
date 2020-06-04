<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    public function index()
    {
//        $tokenStorage = $this->get('security.token_storage');
//        $user = $tokenStorage->getToken()->getUser();

        return $this->render('index.html.twig', [
            'heading' => 'Statystyki Taborowe'
        ]);
    }
}