<?php
/**
 * @author Tim Doerzbacher <tim@tim-doerzbacher.com>
 *
 */

namespace timmd909\Bundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use timmd909\Bundle\Entity\Link;
use timmd909\Bundle\Entity\LinkCategory;
use timmd909\Bundle\DataFixtures\FixtureBase;

class LoadLinkData extends FixtureBase
{

	public function load(ObjectManager $manager)
	{
		$yaml = $this->loadYamlResource('links.yml');
		if (!$yaml) return;

		$linkCategories = $yaml['link_categories'];

		// add in the link categories (and links inside the loop)
		$categoryWeight = 0;
		foreach ($linkCategories as $linkCategory) {
			$linkCategoryEntity = new LinkCategory();
			$linkCategoryEntity->setName($linkCategory['name']);
			$linkCategoryEntity->setWeight($categoryWeight++);

			$manager->persist($linkCategoryEntity);

			// now add in the links
			$linkWeight = 0;
			foreach ($linkCategory['links'] as $link) {
				$linkEntity = new Link();
				$linkEntity->setName($link['name']);
				$linkEntity->setTarget($link['href']);
				$linkEntity->setDescription($link['description']);
				$linkEntity->setCategory($linkCategoryEntity);
				$linkEntity->setWeight($linkWeight++);
				if (isset($link['background']))
					$linkEntity->setImage($link['background']);
				$manager->persist($linkEntity);
			}
		}

		// we're all done, save our progress :-)
		$manager->flush();
	}


} // class

