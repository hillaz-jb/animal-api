<?php

namespace App\Repository;

use App\Entity\AnimalBreed;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnimalBreed|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimalBreed|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimalBreed[]    findAll()
 * @method AnimalBreed[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimalBreedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimalBreed::class);
    }

    // /**
    //  * @return AnimalBreed[] Returns an array of AnimalBreed objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AnimalBreed
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
