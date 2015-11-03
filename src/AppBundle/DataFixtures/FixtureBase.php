<?php
/**
 * @author Tim Doerzbacher <tim@tim-doerzbacher.com>
 *
 */

namespace AppBundle\DataFixtures;

use Doctrine\Common\DataFixtures\FixtureInterface;

abstract class FixtureBase implements FixtureInterface
{
	/**
	 * Loads a Yaml file in the Resources/ folder.
	 * @return mixed An associated array if successful, \c NULL otherwise
	 */
	protected function loadYamlResource($filename)
	{
		$yamlFilename = dirname(__FILE__).'/../../../app/Resources/'.$filename;
		$yaml = \yaml_parse_file($yamlFilename);

		if ($yaml === FALSE) {
			error_log("Unable to load '$yamlFilename'");
			return NULL;
		}

		return $yaml;
	}

}
