<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends ControllerBase
{
	/**
	 * @Route("/", name="homepage")
	 */
	public function indexAction($page)
	{

		// handle the special cases first:
		switch ($page) {
			case 'blog':
				return $this->redirect('http://blog.tim-doerzbacher.com/');
			case 'catpoo':
				return $this->redirect('http://blog.tim-doerzbacher.com/category/robotics/catpoo/');
		}


		// replace this example code with whatever you need
		return $this->render('default/index.html.twig', array(
			'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
			'page' => $page
		));
	}
}
