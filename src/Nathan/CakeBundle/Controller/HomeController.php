<?php
/**
 * Created by PhpStorm.
 * User: Nathan-Y
 * Date: 15-3-3
 * Time: 下午4:38
 */

namespace Nathan\CakeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class HomeController
 * @Route("/")
 */
class HomeController extends Controller {
    /**
     * @Route("/", name="page_index")
     * @Template()
     */
    public function indexAction(){
        $title = "Home Page";
        $injection = "<br /><script>alert(111);</script>";
        $content = "Initializr is an HTML5 templates generator to help you getting started with a new project based on HTML5 Boilerplate. It generates for you a clean customizable template with just what you need to start! ";
        return array('content' => $content, "title"=>$title, 'injection'=>$injection);
    }
} 