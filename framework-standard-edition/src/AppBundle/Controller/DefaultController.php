<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Feedback;
use AppBundle\Form\FeedbackType;
use AppBundle\Form\LoginType;
use AppBundle\Repository\CommentRepository;
use AppBundle\Repository\NewsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $books_fiction = $countNews = $this->getDoctrine()->getManager()->getRepository('AppBundle:Books')->showfiverandombooks('fiction');
        $books_children = $countNews = $this->getDoctrine()->getManager()->getRepository('AppBundle:Books')->showfiverandombooks('children');
        $books_science = $countNews = $this->getDoctrine()->getManager()->getRepository('AppBundle:Books')->showfiverandombooks('science');
        $books_foreign = $countNews = $this->getDoctrine()->getManager()->getRepository('AppBundle:Books')->showfiverandombooks('foreign');
        $books_maps = $countNews = $this->getDoctrine()->getManager()->getRepository('AppBundle:Books')->showfiverandombooks('maps');
        $somebooks=$this->getDoctrine()->getRepository('AppBundle:Books')->lastsixbooks();
        $imgbooks=$this->getDoctrine()->getRepository('AppBundle:Books')->lastnamebooks();
       // dump($books_fiction);
        return $this->render("AppBundle:Default:books.html.twig", ['books_fiction' => $books_fiction, 'books_science' => $books_science, 'books_children' => $books_children,
            'books_maps' => $books_maps, 'books_foreign' => $books_foreign, 'somebooks'=>$somebooks,'imgbooks'=>$imgbooks]);
    }

    /**
     * @Route("/feedback", name="feedback")
     */
/*    public function feedbackAction(Request $request)
    {

        $feedback = new Feedback();
        $form = $this->createForm(FeedbackType::class, $feedback);
        $form->handleRequest($request);
        if (($form->isSubmitted()) && ($form->isValid())) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($feedback);  //dobavlyaiy izmeneniya v bazy dannux
            $em->flush();
            $this->addFlash('success', 'Message saved');
            return $this->redirectToRoute('feedback');
        }

        return $this->render('AppBundle:Default:feedback.html.twig', ['feedback_form' => $form->createView()]);
    }*/

    /**
     * @Route("/fiction/{id}", name="fiction")
     * @Template()
     */
    public function fictionAction($id = '1')
    {
        $books = $this->getDoctrine()->getRepository('AppBundle:Books')->bookpages('fiction', $id);
        $pages = $this->getDoctrine()->getRepository('AppBundle:Books')->pagination('fiction');
        return $this->render("AppBundle:Default:pages.html.twig", ['books' => $books, 'count' => $pages]);
    }

    /**
     * @Route("/children/{id}", name="children")
     * @Template()
     */
    public function childrenAction($id = '1')
    {
        $books = $this->getDoctrine()->getRepository('AppBundle:Books')->bookpages('children', $id);
        $pages = $this->getDoctrine()->getRepository('AppBundle:Books')->pagination('children');
        return $this->render("AppBundle:Default:pages.html.twig", ['books' => $books, 'count' => $pages]);

    }

    /**
     * @Route("/science/{id}", name="science")
     * @Template()
     */
    public function scienceAction($id = '1')
    {
        $books = $this->getDoctrine()->getRepository('AppBundle:Books')->bookpages('science', $id);
        $pages = $this->getDoctrine()->getRepository('AppBundle:Books')->pagination('science');
        return $this->render("AppBundle:Default:pages.html.twig", ['books' => $books, 'count' => $pages]);
    }

    /**
     * @Route("/foreign/{id}", name="foreign")
     * @Template()
     */
    public function foreignAction($id = '1')
    {
        $books = $this->getDoctrine()->getRepository('AppBundle:Books')->bookpages('foreign', $id);
        $pages = $this->getDoctrine()->getRepository('AppBundle:Books')->pagination('foreign');
        return $this->render("AppBundle:Default:pages.html.twig", ['books' => $books, 'count' => $pages]);
    }

    /**
     * @Route("/maps/{id}", name="maps")
     * @Template()
     */
    public function mapsAction($id = '1')
    {
        $books = $this->getDoctrine()->getRepository('AppBundle:Books')->bookpages('maps', $id);
        $pages = $this->getDoctrine()->getRepository('AppBundle:Books')->pagination('maps');
        return $this->render("AppBundle:Default:pages.html.twig", ['books' => $books, 'count' => $pages]);
    }
    /**
     * @Route("/onebook/{id}", name="onebook")
     * @Template()
     */
    public function onebook($id = '1'){
        $book= $this->getDoctrine()->getRepository('AppBundle:Books')->onebook( $id);
        return $this->render("AppBundle:Default:book.html.twig", ['book' => $book]);
    }

    /**
     * @Route("/find", name="find")
     * @Template()
     */
    public function find($id ='1'){
        $book = $this->getDoctrine()->getRepository('AppBundle:Books')->bookpages($_POST['tag'], $id);
        $booksale= $this->getDoctrine()->getRepository('AppBundle:Books')->findBookSale($_POST['tag']);
        $pages = $this->getDoctrine()->getRepository('AppBundle:Books')->pagination($_POST['tag']);

        return $this->render("AppBundle:Default:findBook.html.twig", ['book' => $book, 'count' => $pages, 'booksale'=>$booksale]);
    }
    /**
     * @Route("/basket", name="basket")
     * @Template()
     */
    public function basket($id='1'){
        $id=$_SESSION['user'];
        $book= $this->getDoctrine()->getRepository('AppBundle:Basket')->findBasket($id);
        return $this->render("AppBundle:Default:basket.html.twig", ['book' => $book]);
    }
    /**
     * @Route("/redirectpage/{id}", name="redirectpage")
     *
     */
    public function redirectpage($id='1'){
        //session_start();
        $_SESSION['user']=session_id();
$this->getDoctrine()->getRepository('AppBundle:Basket')->savebook($id);
        $route='http://plotnikova.ho.ua/web/app_dev.php/onebook/'.$id;
        return $this->redirect($route, 308);

}
    /**
     * @Route("/checkin", name="checkin")
     * @Template()
     */
    public function checkin(Request $request){
        $feedback=new User();
$feedback->setActive('1');
        $form=$this->createForm(UserType::class, $feedback);
        $form->add('enter', SubmitType::class, array('attr'=>array('class'=>'enter')));
        $form->handleRequest($request);
        if(($form->isValid())){
            $email=$form->get('email')->getData();

            $password=$form->get('password')->getData();
            $book = $this->getDoctrine()->getRepository('AppBundle:User')->finduser($email, $password);
            if(count($book)>0){
                $id=$_SESSION['user'];
                $basket= $this->getDoctrine()->getRepository('AppBundle:Basket')->findBasket($id);
                $this->render('AppBundle:Default:form.html.twig',['basket'=>$basket]);
            }
            $this->addFlash('success', 'Message saved');
            return $this->redirectToRoute('checkin');
        }

        return $this->render('AppBundle:Default:feedback.html.twig',['feedback_form'=>$form->createView()]);

    }
    /**
     * @Route("/issue", name="issue")
     * @Template()
     */
    public function issue(){

        return $this->render("AppBundle:Default:form.html.twig");

    }
    /**
     * @Route("/registrissue", name="registrissue")
     * @Template()
     */
    public function registrissue(){

        return $this->render("AppBundle:Default:registrform.html.twig");

    }

}