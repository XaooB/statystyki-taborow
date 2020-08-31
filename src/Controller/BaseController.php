<?php

namespace App\Controller;

use App\Services\TextDictionary;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;

abstract class BaseController extends AbstractController
{
    protected $textDictionary;

    public function __construct(TextDictionary $textDictionary) {
        $this->textDictionary = $textDictionary;
    }

    protected function getUser(): UserInterface
    {
        return parent::getUser();
    }

    public function getText($key) {
        try {
            return $this->textDictionary->getText($key);
        } catch (\Exception $e) {
        }
    }
}