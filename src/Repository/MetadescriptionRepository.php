<?php

namespace App\Repository;

use App\Entity\Metadescription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Metadescription|null find($id, $lockMode = null, $lockVersion = null)
 * @method Metadescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method Metadescription[]    findAll()
 * @method Metadescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetadescriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Metadescription::class);
    }

    // /**
    //  * @return Metadescription[] Returns an array of Metadescription objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Metadescription
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
