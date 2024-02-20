<?php

namespace App\Repository;

use App\Entity\Candidate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Candidate>
 *
 * @method Candidate|null find($id, $lockMode = null, $lockVersion = null)
 * @method Candidate|null findOneBy(array $criteria, array $orderBy = null)
 * @method Candidate[]    findAll()
 * @method Candidate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Candidate::class);
    }


    /**
     * @return Candidate[]
     */
    public function findAllCandidateR(): array
    {


        return $this->createQueryBuilder('C')
            ->andWhere('C.Rang IS not null')
            ->andWhere('C.Specialite IS null')
            ->addOrderBy('C.Rang', 'ASC')
            ->getQuery()
            ->execute();
    }
     /**
     * @return Candidate[]
     */
    public function findAllCandidateValide(): array
    {


        return $this->createQueryBuilder('C')
            ->andWhere('C.Rang IS not null')
            ->addOrderBy('C.Rang', 'ASC')
            ->getQuery()
            ->execute();
    }

    /**
     * @return Candidate[]
     */
    public function findAllCandidateRo($str): array
    {


        return $this->createQueryBuilder('C')
            ->andWhere('C.CIN like :str')
            ->orWhere('C.Nom like :str')
            ->orWhere('C.Prenom like :str')
            ->setParameter('str', $str)
            ->getQuery()
            ->execute();
    }

    /**
     * @return Candidate[]
     */
    public function findAllCandidate(): array
    {


        return $this->createQueryBuilder('C')
            ->andWhere('C.Rang IS not null')
            ->andWhere('C.Specialite IS not null')
            ->andWhere('C.Categorie IS  not null')
            ->addOrderBy('C.Rang', 'ASC')
            ->getQuery()
            ->execute();
    }

    //    /**
    //     * @return Candidate[] Returns an array of Candidate objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Candidate
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
