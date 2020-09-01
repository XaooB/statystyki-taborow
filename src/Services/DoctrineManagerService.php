<?php


namespace App\Services;


class DoctrineManagerService
{
    protected $em;

    public function __construct($entityManager)
    {
        $this->em = $entityManager;
    }

    public function save($entity) {
        $this->em->persist($entity);
        $this->em->flush();
    }
}