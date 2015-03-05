<?php
/**
 * Created by PhpStorm.
 * User: Nathan-Y
 * Date: 15-3-5
 * Time: 下午4:10
 */

namespace Nathan\CakeBundle\Controller;

use Doctrine\Common\Util\Debug;
use Nathan\CakeBundle\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BookController
 * @Route("/book")
 */
class BookController extends Controller{
    /**
     * @Route("/add")
     */
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
//        $user = $em->getRepository('NathanCakeBundle:User')->findOneBy(array('id'=>3));
//        $book = new Book();
//        $book->setTitle("nathan happy time I")->setPrice(10)->addUser($user);

//        $book1 = new Book();
//        $book1->setTitle("nathan happy time II")->setPrice(20)->addUser($user);
//        $em->persist($book);
        $book3 = new Book();
        $book3->setTitle("book3")->setPrice(50);
        $em->persist($book3);
        $em->flush();

        return new Response("Book added");
    }

    /**
     * @Route("/listfuser")
     */
    public function listFromUserAction(){
        $em = $this->container->get('doctrine.orm.entity_manager');

        /** @var $user \Nathan\CakeBundle\Entity\User */
        $user = $em->getRepository('NathanCakeBundle:User')->findOneBy(array('id'=>3));

        $list = "";
        /** @var $book \Nathan\CakeBundle\Entity\Book */
        foreach ($user->getBooks() as $book) {
            $list .= $book->getTitle() . "<br>" ;
        }
        return new Response($list);
    }

    /**
     * @Route("/list")
     */
    public function listAction(){
        $em = $this->getDoctrine()->getManager();
        $books = $em->getRepository("NathanCakeBundle:Book")->findAll();
//        $books = $em->getRepository("NathanCakeBundle:Book")
//            ->findBy(
//                array("title"=>"the World War III"),
//                array("price"=>"desc"),
//                10
//            );
//        $books = $em->getRepository("NathanCakeBundle:Book")->findByName("the World War III");

        /*
         * $books = $em->getRepository("NathanCakeBundle:Book")
            ->findByTitle("the World War III");
        */
        $list = "";
        /** @var  $book \Nathan\CakeBundle\Entity\Book */
        foreach ($books as $book) {
            $list .= $book->getId() . " >>>>>> ". $book->getTitle() ." >>>>> " . $book->getPrice() . "<br>" ;
        }
        return new Response($list);
    }

    /**
     * @Route("/update")
     */
    public function updateAction(){
        $em = $this->container->get('doctrine.orm.entity_manager');
        /** @var  $book \Nathan\CakeBundle\Entity\Book*/
        $book = $em->getRepository("NathanCakeBundle:Book")->findOneBy(array('id'=>4));
        $book->setTitle("the World War IV")->setPrice(30);
        $em->persist($book);
        $em->flush();

        return new Response("book updated");
    }

    /**
     * @Route("/show/{id}")
     * @ParamConverter("book", class="NathanCakeBundle:Book")
     */
    public  function showAction(Book $book){
        return new Response($book->getTitle());
    }

    /**
     * @Route("/remove")
     */
    public function removeAction(){
        $em = $this->getDoctrine()->getManager();
        $book = $em->getRepository("NathanCakeBundle:Book")->findOneBy(array('id'=>3));
        $em->remove($book);
        $em->flush();
        return new Response("Book Removed");
    }
} 