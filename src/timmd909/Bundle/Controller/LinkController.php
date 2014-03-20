<?php
/**
 * @author Tim Doerzbacher <tim@tim-doerzbacher.com>
 * 
 */

namespace timmd909\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LinkController extends ControllerBase
{
    public function linkAction()
    {
        $options = array(
            'page' => 'links',  
            'pages' => $this->getDefaultPages() 
        );
        $template = $this->getTemplateFilename('links');
		
		// load all the categories from the database
		$linkCategories = $this->linkCategoryRepository->findAll(array('weight'=>'asc'));
		$options['links'] = array();
		
		foreach ($linkCategories as $category) {
			$tempCategory = array(
				'name'  => $category->getCategoryName(),
				'links' => array()
			);
			
			foreach ($category->getLinks() as $link) {
				$tempLink = array(
					'name'        => $link->getLinkName(),
					'href'        => $link->getLinkTarget(),
					'description' => $link->getLinkDescription(),
					'background'  => $link->getLinkBackground()
				);
				$tempCategory['links'][] = $tempLink;
			}
			
			$options['links'][] = $tempCategory;
		}
		
		return $this->render($template, $options);
	}
	    
}
