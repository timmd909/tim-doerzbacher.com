<?php
/**
 * @author Tim Doerzbacher <tim@tim-doerzbacher.com>
 *
 */

namespace timmd909\Bundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use timmd909\Bundle\DataFixtures\FixtureBase;
use timmd909\Bundle\Entity\Experience;
use timmd909\Bundle\Entity\ExperiencePoint;
use timmd909\Bundle\Entity\Language;
use timmd909\Bundle\Entity\OperatingSystem;
use timmd909\Bundle\Entity\Skill;
use timmd909\Bundle\Entity\Tool;
use timmd909\Bundle\Entity\KeyValue;

class LoadResumeData extends FixtureBase
{
	public function load(ObjectManager $manager)
	{
		$yaml = $this->loadYamlResource('resume.yml');
		if (!$yaml) return;

		$this->loadLanguages  ($manager, $yaml['resume']['languages'] );
		$this->loadTools      ($manager, $yaml['resume']['tools']     );
		$this->loadSkills     ($manager, $yaml['resume']['skills']    );
		$this->loadExperiences($manager, $yaml['resume']['experience']);
		$this->loadOSes       ($manager, $yaml['resume']['operating_systems']);
		$this->loadKeyValues  ($manager, $yaml['resume']['metadata']);

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
			$this->parseExperience($manager, $curr);
		}
	}

	protected function parseExperience(ObjectManager $manager, $entry)
	{
		$experience = new Experience();
		$experience->setName($entry['name']);
		$experience->setDescription($entry['description']);
		$experience->setStarted($entry['duration']['start']);
		$experience->setEnded($entry['duration']['end']);

		$manager->persist($experience);

		// print_r($curr); echo PHP_EOL;

		// we done yet?
		if (!isset($entry['responsibilities']) ||
			count($entry['responsibilities']) < 1)
			return; // all done

		// nope
		foreach ($entry['responsibilities'] as $currResponsibility) {
			$point = $this->parseExperiencePoint($manager, $currResponsibility);
			$point->setExperience($experience);
		} // foreach()

	}

	protected function parseExperiencePoint(ObjectManager $manager, $entry)
	{
		$experiencePoint = new ExperiencePoint();
		$experiencePoint->setDescription($entry['description']);

		if (isset($entry['notes'])) {

			foreach ($entry['notes'] as $currNote) {
				$extraPoint = new ExperiencePoint();

				$extraPoint->setParent($experiencePoint);
				$experiencePoint->addChild($extraPoint);
				$extraPoint->setDescription($currNote);

				// echo $extraPoint, PHP_EOL;

				$manager->persist($extraPoint);
			}


		} // if

		// echo $experiencePoint, PHP_EOL;

		$manager->persist($experiencePoint);
		return $experiencePoint;
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

	protected function loadKeyValues(ObjectManager $manager, array $keyValues)
	{
		foreach ($keyValues as $currKeyValue) {
			$entity = new KeyValue();
			$entity->setKey($currKeyValue['key']);
			$entity->setValue($currKeyValue['value']);
			$manager->persist($entity);
		}
	}

} // class

