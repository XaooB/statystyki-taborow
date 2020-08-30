<?php

namespace App\Repository;

use App\Entity\Repairs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Repairs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Repairs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Repairs[]    findAll()
 * @method Repairs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepairsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Repairs::class);
    }
}
