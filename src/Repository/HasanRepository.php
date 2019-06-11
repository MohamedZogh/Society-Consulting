<?php

namespace App\Repository;

use App\Entity\Hasan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Hasan|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hasan|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hasan[]    findAll()
 * @method Hasan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HasanRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Hasan::class);
    }

    // /**
    //  * @return Hasan[] Returns an array of Hasan objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hasan
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
