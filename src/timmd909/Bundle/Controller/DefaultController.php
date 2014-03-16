<?php

namespace timmd909\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($page = NULL)
    {
    	switch ($page) {
			case '2009': case '2013':  
				return $this->redirect('http://old.tim-doerzbacher.com/'.$page);
			case 'blog':  
				return $this->redirect('http://blog.tim-doerzbacher.com/');
			default:
	        	return $this->render(
	        		'TimDoerzbacherBundle:Default:index.html.twig', 
	        		array(
	        			'page' => $page, 
	        			'pages' => array('home','blog', 'resume', 'links') 
					)
			);
    	} // switch
    	
    	return;
    } // function 
}
