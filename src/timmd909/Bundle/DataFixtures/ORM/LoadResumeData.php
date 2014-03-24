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

		$this->loadLanguages  ($manager, $yaml['resume']['languages'] );
		$this->loadTools      ($manager, $yaml['resume']['tools']     );
		$this->loadSkills     ($manager, $yaml['resume']['skills']    );
		$this->loadExperiences($manager, $yaml['resume']['experience']);
		$this->loadOSes       ($manager, $yaml['resume']['operating_systems']);
		
		// we're all done, save our progress :-)
		$manager->flush();
	}
	
	protected function loadLanguages(ObjectManager $manager, array $languages)
	{
		foreach ($languages['entries'] as $currLanguage)
		{
			$languageEntity = new Language();
			$languageEntity->setName($currLanguage['name']);
			$languageEntity->setLevel($currLanguage['level']);
			$manager->persist($languageEntity);
		}
	}
	
	protected function loadTools(ObjectManager $manager, array $tools) 
	{
		
	}

	protected function loadSkills(ObjectManager $manager, array $skill) 
	{
		
	}
	
	protected function loadExperiences(ObjectManager $manager, array $experiences) 
	{
		
	}

	protected function loadOSes(ObjectManager $manager, array $oses) 
	{
		
	}

	

} // class

	