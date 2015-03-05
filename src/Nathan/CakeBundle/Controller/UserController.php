<?php
/**
 * Created by PhpStorm.
 * User: Nathan-Y
 * Date: 15-3-5
 * Time: 下午3:44
 */

namespace Nathan\CakeBundle\Controller;

use Nathan\CakeBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserController
 * @Route("/user")
 */
class UserController extends Controller {
    /**
     * @Route("/new")
     */
    public function indexAction(){
//        $em = $this->container->get('doctrine.orm.entity_manager');
//        $em = $this->getDoctrine()->getManager();
        $em = $this->getDoctrine()->getEntityManager();
        $user = new User();
        $user->setAge(20);
        $user->setUsername("nathan");
        $user->setPassword("111111");
        $em->persist($user);
        $em->flush();
        return new Response("User added");
    }

    /**
     * @Route("/remove")
     */
    public function removeAction(){
        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository("NathanCakeBundle:User")->findOneBy(array('id'=>2));
        $em->remove($user);
        $em->flush();
        return new Response("user deleted");
    }
} 