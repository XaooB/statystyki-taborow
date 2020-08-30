<?php

namespace App\Repository;

use App\Entity\Performer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Performer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Performer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Performer[]    findAll()
 * @method Performer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PerformerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Performer::class);
    }
}
