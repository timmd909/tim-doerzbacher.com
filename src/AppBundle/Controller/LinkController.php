<?php
/**
 * @author Tim Doerzbacher <tim@tim-doerzbacher.com>
 *
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LinkController extends ControllerBase
{
	public function linkAction()
	{
		$options = array(
			'page' => 'links',
			'pages' => $this->getDefaultPages()
		);

		// load all the categories from the database
		$linkCategories = $this->linkCategoryRepository->findAll(array('weight'=>'asc'));
		$options['links'] = array();

		foreach ($linkCategories as $category) {
			$tempCategory = array(
				'name'  => $category->getName(),
				'links' => array()
			);

			foreach ($category->getLinks() as $link) {
				$tempLink = array(
					'name'        => $link->getName(),
					'href'        => $link->getTarget(),
					'description' => $link->getDescription(),
					'background'  => $link->getImage()
				);
				$tempCategory['links'][] = $tempLink;
			}

			$options['links'][] = $tempCategory;
		}

		$template = $this->getTemplateFilename('resume');
		return $this->render($template, $options);
	}

}
