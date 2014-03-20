<?php
/**
 * @author Tim Doerzbacher <tim@tim-doerzbacher.com>
 * 
 */

namespace timmd909\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Base for all of my website's controllers.
 * 
 * Has a few common variables and methods required. Not much else to see here.
 */
class ControllerBase extends Controller
{
    protected function getEntityManager()
	{
		static $em = NULL;
		
		if ($em === NULL) {
			$em = $this->get('doctrine');
		}
		
		return $em;
	}
	
	protected function getTemplateFilename($page)
	{
		return sprintf('TimDoerzbacherBundle:Default:%s.html.twig', $page);
	}
	
	protected function getDefaultPages()
	{
		return array('home','blog', 'resume', 'links');
	}
	
	public function __get($variable) 
	{
		switch ($variable) {
			case 'logger': {
				return $this->get('logger');
			} break;
			// ... more in the future? 
		} // switch 
		
		
		if (strrpos($variable, 'Repository') !== FALSE) {
			$repository = '\\timmd909\\Bundle\\Entity\\' . ucfirst(
				substr($variable, 0, 
					strrpos($variable, 'Repository')
				)
			);
			return $this->getEntityManager()->getRepository($repository);
		}
		
		
		// couldn't find a match, getting outta here 
		throw \Exception("Couldn't find '$variable' in ".__CLASS__);
	}
}
