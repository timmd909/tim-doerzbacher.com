<?php
/**
 * @author Tim Doerzbacher <tim@tim-doerzbacher.com>
 * 
 */

namespace timmd909\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ResumeController extends ControllerBase
{
    public function resumeAction()
    {
        $options = array(
            'page' => 'links',  
            'pages' => $this->getDefaultPages() 
        );
        $template = $this->getTemplateFilename('resume');
		
		
		$experiences = $this->experienceRepository->findAll();
		$options['experiences'] = $experiences;
		
		
		// // load all the categories from the database
		// $linkCategories = $this->linkCategoryRepository->findAll(array('weight'=>'asc'));
		// $options['links'] = array();
// 		
		// foreach ($linkCategories as $category) {
			// $tempCategory = array(
				// 'name'  => $category->getName(),
				// 'links' => array()
			// );
// 			
			// foreach ($category->getLinks() as $link) {
				// $tempLink = array(
					// 'name'        => $link->getName(),
					// 'href'        => $link->getTarget(),
					// 'description' => $link->getDescription(),
					// 'background'  => $link->getImage()
				// );
				// $tempCategory['links'][] = $tempLink;
			// }
// 			
			// $options['links'][] = $tempCategory;
		// }
		
		return $this->render($template, $options);
	}
	    
}
