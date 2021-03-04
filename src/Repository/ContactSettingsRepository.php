<?php

namespace App\Repository;

use App\Entity\ContactSettings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContactSettings|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactSettings|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactSettings[]    findAll()
 * @method ContactSettings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactSettingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactSettings::class);
    }

    // /**
    //  * @return ContactSettings[] Returns an array of ContactSettings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContactSettings
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
