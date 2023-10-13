<?php

namespace App\Repository;

use App\Entity\OrdersArticles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OrdersArticles>
 *
 * @method OrdersArticles|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrdersArticles|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrdersArticles[]    findAll()
 * @method OrdersArticles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdersArticlesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrdersArticles::class);
    }

//    /**
//     * @return OrdersArticles[] Returns an array of OrdersArticles objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OrdersArticles
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
