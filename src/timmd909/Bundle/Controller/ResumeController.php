<?php
/**
 * @author Tim Doerzbacher <tim@tim-doerzbacher.com>
 */

namespace timmd909\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ResumeController extends ControllerBase
{
    public function resumeAction()
    {
        $options = array(
            'page' => 'resume',
            'pages' => $this->getDefaultPages()
        );
        $template = $this->getTemplateFilename('resume');

		$options['experiences']       = $this->experienceRepository->findAll();
		$options['skills']            = $this->skillRepository->findAll();
		$options['tools']             = $this->toolRepository->findAll();
		$options['languages']         = $this->languageRepository->findAll();
		$options['operating_systems'] = $this->operatingSystemRepository->findAll();

		$keyValues = $this->keyValueRepository->findAll();
		$options['key_values'] = array();
		foreach ($keyValues as $currKeyValue) {
			$options['key_values'][$currKeyValue->getKey()] =
				$currKeyValue->getValue();
		}

		return $this->render($template, $options);
	}

}
