<?php

namespace App\Repository;

use App\Entity\GroupStatistic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GroupStatistic>
 *
 * @method GroupStatistic|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupStatistic|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupStatistic[]    findAll()
 * @method GroupStatistic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupStatisticRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GroupStatistic::class);
    }

    //    /**
    //     * @return GroupStatistic[] Returns an array of GroupStatistic objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('g.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?GroupStatistic
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
