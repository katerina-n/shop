<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Feedback;
use AppBundle\Form\FeedbackType;
use AppBundle\Form\LoginType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class DefaultController extends Controller
{
    /**
     * @Route("/admin", name="admin_homepage")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        if ($_SESSION['user']) {
            $login = new Feedback();
            $form = $this->createForm(LoginType::class, $login);
            $form->handleRequest($request);
           
            // return $this->render("AppBundle:Admin:Default:index.html.twig",['login_form'=>$form->createView()]);
            return ['login_form' => $form->createView()];
        }
    }

    /**
     * @Route("/admin/feedback", name="admin_feedback")
     */
    public function feedbackAction(Request $request){

        $feedback=new Feedback();
        $form=$this->createForm(FeedbackType::class, $feedback);
        $form->handleRequest($request);
        if(($form->isSubmitted())&&($form->isValid())){
            $em=$this->getDoctrine()->getManager();
            $em->persist($feedback);  //dobavlyaiy izmeneniya v bazy dannux
            $em->flush();
            $this->addFlash('success', 'Message saved');
            return $this->redirectToRoute('feedback');
        }

        return $this->render('AppBundle:Admin:Default:feedback.html.twig',['feedback_form'=>$form->createView()]);
    }
    /**
     * @Route("/admin/formul", name="admin_formul")
     */
    public function formulAction(Request $request){
        $formul="formul";
        return $this->render("AppBundle:Admin:Default:formul.html.twig",['formul'=>$formul]);
    }
    /**
     * @Route("/admin/tables", name="admin_tables")
     * @Template()
     */
    public function tablesAction(Request $request){
        $table="table";
       return $this->render("AppBundle:Admin:Default:tables.html.twig",['table'=>$table]);
       // return $this->render(['table'=>$table]);
    }
}
