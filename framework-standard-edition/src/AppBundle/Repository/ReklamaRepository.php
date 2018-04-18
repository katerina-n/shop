<?php

namespace AppBundle\Repository;

/**
 * ReklamaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReklamaRepository extends \Doctrine\ORM\EntityRepository
{
    public function findReklama(){
        $sql= $this->createQueryBuilder('reklama')
            ->addOrderBy('date', 'DESC')
            ->setMaxResults(3)
            ->getQuery()  //tochka posle zaprosa
            ->getResult();
        $json=json_encode($sql);
        echo $json;
    }

}
