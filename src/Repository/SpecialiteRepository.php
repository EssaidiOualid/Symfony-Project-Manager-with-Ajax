<?php

namespace App\Repository;

use App\Entity\Specialite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Specialite>
 *
 * @method Specialite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Specialite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Specialite[]    findAll()
 * @method Specialite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecialiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Specialite::class);
    }

    //    /**
    //     * @return Specialite[] Returns an array of Specialite objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Specialite
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    /**
     * @return Specialite[]
     */
    public function findAllSpecialiteContra(): array
    {


        return $this->createQueryBuilder('s')
            ->leftJoin('s.posts', 'posts')
            ->andWhere('posts.Categorie = 2')
            ->getQuery()
            ->execute();
    }

    /**
     * @return Specialite[]
     */
    public function findAllSpecialiteB(): array
    {

        return $this->createQueryBuilder('s')
            ->leftJoin('s.posts', 'posts')
            ->andWhere('posts.Categorie = 1')
            ->getQuery()
            ->execute();
    }
}
