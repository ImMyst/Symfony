<?php

namespace App\Repository;

use App\Entity\List;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method List|null find($id, $lockMode = null, $lockVersion = null)
 * @method List|null findOneBy(array $criteria, array $orderBy = null)
 * @method List[]    findAll()
 * @method List[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, List::class);
    }

//    /**
//     * @return List[] Returns an array of List objects
//     */
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
    public function findOneBySomeField($value): ?List
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
