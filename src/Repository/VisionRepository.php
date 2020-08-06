<?php

namespace App\Repository;

use App\Entity\Vision;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vision|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vision|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vision[]    findAll()
 * @method Vision[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VisionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vision::class);
    }

    // /**
    //  * @return Vision[] Returns an array of Vision objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vision
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
