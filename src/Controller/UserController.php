<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends BaseController
{
//    public function add(EntityManagerInterface $entityManager, UserPasswordEncoderInterface $encoder) {
//        $user = new User();
//        $user->setUsername('sebalorek')
//            ->setPassword($encoder->encodePassword($user, 'test123'));
//
//        $entityManager->persist($user);
//        $entityManager->flush();
//
//        return new Response('User #' . $user->getId() . ' created!');
//    }

    public function login(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('User/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    public function logout()
    {
    }
}