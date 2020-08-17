<?php

namespace App\Repository;

use App\Entity\Locr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Locr|null find($id, $lockMode = null, $lockVersion = null)
 * @method Locr|null findOneBy(array $criteria, array $orderBy = null)
 * @method Locr[]    findAll()
 * @method Locr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocrRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Locr::class);
    }

    // /**
    //  * @return Locr[] Returns an array of Locr objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Locr
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
