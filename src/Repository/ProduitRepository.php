<?php

namespace App\Repository;

use App\Classe\Search;
use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    /**
     * Requete qui me permet de récuperer les produits en fonction de la recherche
     * @return Produit[]
     */

    public function findWithSearch (Search $search)
    {
        $query = $this
        ->createQueryBuilder('p')
        ->select('g','p')
        ->join('p.genre', 'g');

        if (!empty($search->genres)) {
            $query = $query
            ->andWhere('g.id IN (:genres)')
            ->setParameter('genres', $search->genres);
        }

        if (!empty($search->string)) {
            $query = $query
            ->andWhere('p.titre LIKE :string')
            ->setParameter('string', "%{$search->string}%");
        }

        return $query->getQuery()->getResult();

    }
    // /**
    //  * @return Produit[] Returns an array of Produit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Produit
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
