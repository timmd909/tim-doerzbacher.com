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
		if (FALSE !== preg_match('/[a-z0-9]/', $page)) {
			$template = sprintf('default/%s.html.twig', $page);
			return $this->render($template, array(
				'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
				'ALL_PAGES' => $this->getDefaultPages(),
				'PAGE' => $page
			));
		}

	}
}
