<?php
namespace AppBundle\Repository;
use \Doctrine\ORM\EntityManager;

class NewsRepository extends \Doctrine\ORM\EntityRepository
{
    public function findLast()
    {
        $collections = [];

        $collection[] = $this->createQueryBuilder('answer_comment')->getQuery()->getResult();
        return $collections;

    }

    public function lastsixnews()
    {

       $collection[] = $this->createQueryBuilder('news')
            ->select('news.picture')
            ->addOrderBy('news.created')
            ->setMaxResults(6)
            ->getQuery()//tochka posle zaprosa
            ->getResult();
        $element=$collection[0];
        $str=[];
for($i=0; $i<=count($element)-1; $i++){
   $str[]=implode($element[$i]);
}
       // dump($str);
        return $str;
    }
    public function lastnamenews(){
        $collection[] = $this->createQueryBuilder('news')
            ->select('news.name')
            ->addOrderBy('news.created')
            ->setMaxResults(6)
            ->getQuery()//tochka posle zaprosa
            ->getResult();
        $element=$collection[0];
        $str=[];
        for($i=0; $i<=count($element)-1; $i++){
            $str[]=implode($element[$i]);
        }
      //  dump($str);
        return $str;
    }
    public function findBycategory($nameCategory, $id){
       // $collections=[];
        $collections = $this->createQueryBuilder('news')
            ->where('news.newsName =:identifier')
            ->addOrderBy('news.id', 'ASC')
            ->setFirstResult(5*($id-1))
            ->setMaxResults(5)
            ->setParameters(['identifier'=>$nameCategory])
            ->getQuery()
            ->getResult();
        dump($collections);
        return $collections;
    }
    /*
      public static function save($table_name, $id, $name, $content, $created, $picture, $tag, $visit)
      {
          global $pdo;

          if ($id == null) {
              $sql = "INSERT INTO `{$table_name}`(name, content, created, picture, tag, visit) VALUES ('{$name}' , '{$content}', '{$created}', '{$picture}', '{$tag}', '{$visit}')";
              $std = $pdo->prepare($sql);
              // $std=$pdo->query($sql);
              $std->execute();
          } else
              if ($id != null) {
                  $i = $id;

                  $sql = "UPDATE `{$table_name}` SET name= '{$name}', content= '{$content}', created= '{$created}', picture= '{$picture}', tag= '{$tag}', visit= '{$visit}' WHERE id='{$i}'";
                  $std = $pdo->prepare($sql);
                  // $std=$pdo->query($sql);
                  $std->execute();


              }
      }


      public static function delete($table_name, $id)
      {
          global $pdo;
          $sql = "DELETE from `{$table_name}` where id={$id}";
          $std = $pdo->prepare($sql);
          // $std=$pdo->query($sql);
          $std->execute();


      }


      public static function saveCom($id, $name, $content, $created, $picture, $tag, $visit)
      {
          global $pdo;

          $sql = "UPDATE `comment` SET table_name= '{$name}', news_id= '{$content}', user_name= '{$created}', comments= '{$picture}', like_n= '{$tag}', status= '{$visit}' WHERE id='{$id}'";
          $std = $pdo->prepare($sql);
          // $std=$pdo->query($sql);
          $std->execute();
      }

      public static function deleteCom($id)
      {
          global $pdo;
          $sql = "DELETE from `comment` where id={$id}";
          $std = $pdo->prepare($sql);
          // $std=$pdo->query($sql);
          $std->execute();


      }

      public static function findAllReklama()
      {
          global $pdo;
          $collections = [];

          $sql = "SELECT * FROM `reklama`";

          $std = $pdo->prepare($sql);
          $std->execute();
          $result = $std->fetchAll(\PDO::FETCH_ASSOC);

          for ($i = 0; $i <= count($result) - 1; $i++) {

              $tests = (new Reklamas())->setId($result[$i]['id'])
                  ->setName($result[$i]['name'])
                  ->setNameFirm($result[$i]['name_firm'])
                  ->setPrice($result[$i]['price'])
                  ->setDate($result[$i]['date']);

              $collections[] = $tests;

          }

          return $collections;
      }

      public static function saveRekl($id, $name, $content, $created, $picture)
      {
          global $pdo;
          if ($id == null) {
              $sql = "INSERT INTO `reklama`(name, name_firm, price, date) VALUES ('{$name}' , '{$content}', '{$created}', '{$picture}')";
              $std = $pdo->prepare($sql);
              // $std=$pdo->query($sql);
              $std->execute();
          } else {

              $sql = "UPDATE `reklama` SET name= '{$name}', name_firm ='{$content}', price= '{$created}', date= '{$picture}' WHERE id='{$id}'";
              $std = $pdo->prepare($sql);
              // $std=$pdo->query($sql);
              $std->execute();
          }
      }

  }*/
}