<?php

namespace timmd909\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TimDoerzbacherBundle:Default:index.html.twig', array('name' => $name));
    }
}
