<?php

namespace App\Repository;

use App\Entity\Articles;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

use Doctrine\ORM\Query\Expr\Join;

use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Articles|null find($id, $lockMode = null, $lockVersion = null)
 * @method Articles|null findOneBy(array $criteria, array $orderBy = null)
 * @method Articles[]    findAll()
 * @method Articles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticlesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Articles::class);
    }

    // /**
    //  * @return Articles[] Returns an array of Articles objects
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
    public function findByExampleField($value): array
    {
        $this->getEntityManager()->getConnection();
        $entityManager = $this->getEntityManager();

//        $query = $entityManager->createQuery(
//            'SELECT art,cat FROM App\Entity\Articles art  JOIN App\Entity\Category cat
//            ON cat.id = art.articles_id where cat.name=:cate'
//        )->setParameter('cate', $value);
//
//        return $query->getResult();
        return $this->createQueryBuilder('c')->from('App\Entity\Articles','art')
            ->join('App\Entity\Category','cat',Join::WITH,'cat.id=art.articles_id')
            ->where(' cat.name=:cate')->setParameter('cate', $value)->getQuery()->getResult();

//        $stmt = $db->prepare('SELECT * FROM articles art  JOIN category cat on cat.id = art.articles_id where cat.name=?');
//        $stmt->execute(array($value));
//
//        return $stmt->fetchAll();


    }
    /*
    public function findOneBySomeField($value): ?Articles
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
