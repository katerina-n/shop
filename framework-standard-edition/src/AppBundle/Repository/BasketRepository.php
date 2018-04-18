<?php

namespace AppBundle\Repository;
use AppBundle\Entity\Basket;
use AppBundle\Repository\BooksRepository;
use Symfony\Component\VarDumper\Cloner\Data;

/**
 * BasketRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BasketRepository extends \Doctrine\ORM\EntityRepository
{
    public function findBasket($user){
        $collections = $this->createQueryBuilder('basket')
            ->where('basket.user = :fictions')
            ->setParameter('fictions', $user)
            ->getQuery()         //tochka posle zaprosa
            ->getResult();
        // dump($collections);
        return $collections;
    }
    public function savebook($id){
        $book = $this->getEntityManager()->getRepository('AppBundle:Books')->onebook($id);
       dump($book);

//session_start();
            $user= $_SESSION['user'];

        $order=new Basket();
       $order->setCategoryBook($book[0]->getCategoryBook());
       $order->setName($book[0]->getName());
       $order->setBookId($book[0]->getId());
       $order->setPrice($book[0]->getPrice());
       $order->setUser($user);
       $order->setData(date(DATE_ATOM));
        $em=$this->getEntityManager();
        $em->persist($order);
        $em->flush();
//return new Response($order->getId());
        // dump($collections);

    }
}
