<?php

namespace App\Controller;

use App\Services\TextDictionary;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;

abstract class BaseController extends AbstractController
{
    protected function getUser(): UserInterface
    {
        return parent::getUser();
    }

    protected function getEntity($entity) {
        return $this->getDoctrine()->getManager()->getRepository($entity);
    }
}