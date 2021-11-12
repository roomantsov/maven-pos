<?php

namespace App\Repository;

use App\Entity\OrderRequestItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OrderRequestItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderRequestItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderRequestItem[]    findAll()
 * @method OrderRequestItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderRequestItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderRequestItem::class);
    }

    // /**
    //  * @return OrderRequestItem[] Returns an array of OrderRequestItem objects
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
    public function findOneBySomeField($value): ?OrderRequestItem
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
