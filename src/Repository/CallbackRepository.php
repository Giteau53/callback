<?php

namespace App\Repository;


use App\Entity\Callback;


use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Callback|null find($id, $lockMode = null, $lockVersion = null)
 * @method Callback|null findOneBy(array $criteria, array $orderBy = null)
 * @method Callback[]    findAll()
 * @method Callback[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CallbackRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Callback::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Callback $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Callback $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    
    public function findByDate()
    {

        $dateNow = new \DateTime('now');
        
        return $this->createQueryBuilder('c')
            ->Where('c.date = :dateNow')
            ->setParameter('dateNow', $dateNow ->format('Y-m-d') )         
            ->getQuery()
            ->getResult()
        ;
    }


/**
 * Recherche les annonces par le formulaire
 * @return void
 */

 public function search($mots){
    $query = $this->createQueryBuilder('a');
    // $query->where('a.active = 1');
    if($mots != null){
        $query->andWhere('MATCH_AGAINST(a.lastname, a.firstname, a.message) AGAINST (:mots boolean)>0')
            ->setParameter('mots', $mots);
    }
    return $query->getQuery()->getResult();
 }


    /*
    public function findOneBySomeField($value): ?Callback
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
