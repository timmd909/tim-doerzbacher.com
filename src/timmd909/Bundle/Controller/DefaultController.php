<?php
/**
 * @author Tim Doerzbacher <tim@tim-doerzbacher.com>
 * 
 */

namespace timmd909\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($page = NULL)
    {
        // handle the special cases first:
    	switch ($page) {
			case '2009': case '2013':  
				return $this->redirect('http://old.tim-doerzbacher.com/'.$page);
			case 'blog':  
				return $this->redirect('http://blog.tim-doerzbacher.com/');
        }
        
        // -=- -=- -=- the rest of these pages are all Symfony pages -=- -=- -=- // 
        
        // the standard options'n'at for all pages:
        $options = array(
            'page' => $page,  
            'pages' => array('home','blog', 'resume', 'links') 
        );
        $template = sprintf('TimDoerzbacherBundle:Default:%s.html.twig', $page);
         
		// do we have a special page? 
        switch ($page) {
        	case 'links': {
        		$em = $this->getEntityManager();
        		$options['categories'] = array('Personal Projects', 'Social Networks');
            } break;
            // other pages that require additional info go here  
        }
		
		// render me time :-)
        return $this->render($template, $options);
    } // function 
    
    protected function getEntityManager()
	{
		static $em = NULL;
		
		if ($em === NULL) {
			$em = $this->get('doctrine');
		}
		
		return $em;
	}
}
