<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 *
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    //    /**
    //     * @return Post[] Returns an array of Post objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Post
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    /**
     * @return Post[] Returns an array of Post objects
     */
    public function findBySession(): array
    {
        $active = '1';
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            "SELECT p
            FROM App\Entity\Post p
            inner Join App\Entity\Session  s
            WHERE s.active = :active
            "
        )->setParameter('active', $active);

        return $query->getResult();
    }

    public function findTotal()
    {

        $query = "SELECT SUM(nbr_reste) as total FROM `post`";
        $statement = $this->getEntityManager()->getConnection()->prepare($query);
        $result = $statement->executeQuery()->fetchAssociative();
        return  $result;
    }
    public function findSommeBySpecialite()
    {

        $query = "SELECT `specialite_id`, SUM(nbr_reste) as somme FROM `post` GROUP BY `specialite_id`";
        $statement = $this->getEntityManager()->getConnection()->prepare($query);
        $result = $statement->executeQuery()->fetchAllAssociative();
        return  $result;
    }

    public function findSommeByType()
    {
        $query = "SELECT T.intitule, SUM(nbr_reste) as somme FROM post P INNER JOIN specialite S ON P.specialite_id = S.id INNER JOIN type T ON T.id = S.type_id GROUP BY `type_id`";
        $statement = $this->getEntityManager()->getConnection()->prepare($query);
        $result = $statement->executeQuery()->fetchAllAssociative();
        return  $result;
    }

    public function findSommeByTypeT()
    {
        $query = "SELECT  SUM(nbr_post) as somme FROM post P INNER JOIN specialite S ON P.specialite_id = S.id INNER JOIN type T ON T.id = S.type_id GROUP BY `type_id`";
        $statement = $this->getEntityManager()->getConnection()->prepare($query);
        $result = $statement->executeQuery()->fetchAllAssociative();
        return  $result;
    }


    public function findTotalByTypeT()
    {
        $query = "SELECT SUM(nbr_post) as total FROM `post`";
        $statement = $this->getEntityManager()->getConnection()->prepare($query);
        $result = $statement->executeQuery()->fetchAssociative();
        return  $result;
    }
}
