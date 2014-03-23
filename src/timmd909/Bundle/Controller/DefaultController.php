<?php
/**
 * @author Tim Doerzbacher <tim@tim-doerzbacher.com>
 * 
 */

namespace timmd909\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends ControllerBase
{
    public function indexAction($page = NULL)
    {
        // handle the special cases first:
    	switch ($page) {
			case '2009': case '2013':  
				return $this->redirect('http://old.tim-doerzbacher.com/'.$page);
			case 'blog':  
				return $this->redirect('https://blog.tim-doerzbacher.com/');
        }
        
        // -=- -=- -=- the rest of these pages are all Symfony pages -=- -=- -=- // 
        
        // the standard options'n'at for all pages:
        $options = array(
            'page' => $page,  
            'pages' => $this->getDefaultPages() 
        );
        $template = $this->getTemplateFilename($page);
		
		$this->logger->info("Loading page '$page'");
		
		// render me time :-)
        return $this->render($template, $options);
    } // function 
    
}
