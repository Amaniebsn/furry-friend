<?php

namespace App\Repository;

use App\Entity\Animals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Animals>
 *
 * @method Animals|null find($id, $lockMode = null, $lockVersion = null)
 * @method Animals|null findOneBy(array $criteria, array $orderBy = null)
 * @method Animals[]    findAll()
 * @method Animals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimalsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Animals::class);
    }

    public function save(Animals $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Animals $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Requête qui me permet de récuprer les animaux en fonction de la recherche de l'utilisateur.
     * @return Animals[]
     */
    public function findWithSearch ($search)
    {
       $query = $this
       ->createQueryBuilder('p')
       ->select('c', 'p')
       ->join('p.category', 'c');

       if (!empty($search->categories)) {
           $query = $query
                 ->andWhere('c.id IN (:categories)')
                 ->setParameter('categories', $search->categories);

       }

       if (!empty($search->string)){
           $query = $query
                  ->andWhere('p.name LIKE :string')
                  ->setParameter('string', "%{$search->string}%");
       }

        return $query->getQuery()->getResult();

    }


//    /**
//     * @return Animals[] Returns an array of Animals objects
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

//    public function findOneBySomeField($value): ?Animals
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
