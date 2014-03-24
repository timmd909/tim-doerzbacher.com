<?php
/**
 * @author Tim Doerzbacher <tim@tim-doerzbacher.com>
 * 
 */

namespace timmd909\Bundle\DataFixtures;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use timmd909\Bundle\Entity\Language;

  
class LoadResumeData implements FixtureInterface
{
	/// Relative filename 
	const REL_FILENAME = './../../Resources/resume.yml';
	
	public function load(ObjectManager $manager)
	{
		$yamlFilename = dirname(__FILE__).'/'.self::REL_FILENAME;
		$yaml = \yaml_parse_file($yamlFilename);
		
		if ($yaml === FALSE) {
			error_log("Unable to load '$yamlFilename'");
			return;
		}

		$this->loadLanguages($yaml['resume']['languages']);
				
		
		// we're all done, save our progress :-)
		$manager->flush();
	}
	
	protected function loadLanguages($languages)
	{
		foreach ($languages['entries'] as $currLanguage)
		{
			
		}		
	}
	

} // class

	