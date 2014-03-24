<?php
/**
 * @author Tim Doerzbacher <tim@tim-doerzbacher.com>
 * 
 */

namespace timmd909\Bundle\DataFixtures;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use timmd909\Bundle\Entity\Experience;
use timmd909\Bundle\Entity\Language;
use timmd909\Bundle\Entity\OperatingSystem;
use timmd909\Bundle\Entity\Skill;
use timmd909\Bundle\Entity\Tool;
  
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
		foreach ($languages['entries'] as $curr) {
			$entity = new Language();
			$entity->setName($curr['name']);
			$entity->setLevel($curr['level']);
			$manager->persist($entity);
		}
	}
	
	protected function loadTools(ObjectManager $manager, array $tools) 
	{
		foreach ($tools['entries'] as $curr) {
			$entity = new Tool();
			$entity->setName($curr['name']);
			$entity->setLevel($curr['level']);
			$manager->persist($entity); 
		}
	}

	protected function loadSkills(ObjectManager $manager, array $skills) 
	{
		foreach ($skills['entries'] as $curr) {
			$entity = new Skill();
			$entity->setName($curr['name']);
			$entity->setLevel($curr['level']);
			$manager->persist($entity); 
		}
	}
	
	protected function loadExperiences(ObjectManager $manager, array $experiences) 
	{
		foreach ($experiences['entries'] as $curr) {
			$entity = new Experience();
			$entity->setName($curr['name']);
			$entity->setDescription($curr['description']);
			$entity->setStarted($curr['duration']['start']);
			$entity->setEnded($curr['duration']['end']);
			$manager->persist($entity); 
		}
	}

	protected function loadOSes(ObjectManager $manager, array $oses) 
	{
		foreach ($oses['entries'] as $curr) {
			$entity = new OperatingSystem();
			$entity->setName($curr['name']);
			$entity->setLevel($curr['level']);
			$manager->persist($entity); 
		}
	}

	

} // class

	