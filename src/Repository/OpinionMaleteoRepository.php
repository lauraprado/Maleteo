<?php

namespace App\Repository;

use App\Entity\OpinionMaleteo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OpinionMaleteo|null find($id, $lockMode = null, $lockVersion = null)
 * @method OpinionMaleteo|null findOneBy(array $criteria, array $orderBy = null)
 * @method OpinionMaleteo[]    findAll()
 * @method OpinionMaleteo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpinionMaleteoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OpinionMaleteo::class);
    }

    // /**
    //  * @return OpinionMaleteo[] Returns an array of OpinionMaleteo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OpinionMaleteo
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
