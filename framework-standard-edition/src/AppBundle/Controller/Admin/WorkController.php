<?php
namespace AppBundle\Controller\Admin;
use AppBundle\AppBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class WorkController extends Controller{
    /**
     * @Route("/Admin/homework", name="admin_homework")
     */
    public function homeworkAction(Request $request){
        $homework=$this->getDoctrine()->getManager()->getRepository('AppBundle:Homeworks')->findAll();

        return $this->render("AppBundle:Work:homework.html.twig",['homework'=>$homework]);
    }
    /**
     * @Route("/Admin/test", name="admin_test")
     */
    public function testAction(Request $request){
       // $test=["test","test2"];
        $test=$this->getDoctrine()->getManager()->getRepository('AppBundle:Tests')->findAll();
        return $this->render("AppBundle:Work:test.html.twig",['test'=>$test]);
    }
    /**
     * @Route("/Admin/test/{id}", name="admin_test_i", requirements={"id":"[0-9]+"})
     */
    public function showAction($id){
        $test_o="test"+$id;
        return $this->render("AppBundle:Work:test.html.twig",['test'=>$test_o]);

    }
}