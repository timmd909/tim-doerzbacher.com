<?php
/**
 * @author Tim Doerzbacher <tim@tim-doerzbacher.com>
 *
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="experience_points")
 */
class ExperiencePoint
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $description;

	/**
	 * @ORM\ManyToOne(targetEntity="Experience", inversedBy="experiencePoints")
	 * @ORM\JoinColumn(name="experience_id", referencedColumnName="id", nullable=true)
	 */
	protected $experience;

	/**
	 * @ORM\OneToMany(targetEntity="ExperiencePoint", mappedBy="parent")
	 *
	 */
	protected $children;

	/**
	 * @ORM\ManyToOne(targetEntity="ExperiencePoint", inversedBy="children")
	 * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
	 */
	protected $parent;

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */

	function __constructor()
	{
		$this->children = new ArrayCollection;
	}

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->children = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */

	/**
	 * Set description
	 *
	 * @param string $description
	 * @return ExperiencePoint
	 */
	public function setDescription($description)
	{
		$this->description = $description;

		return $this;
	}

	/**
	 * Get description
	 *
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */

	/**
	 * Set experience
	 *
	 * @param \AppBundle\Entity\Experience $experience
	 * @return ExperiencePoint
	 */
	public function setExperience(\AppBundle\Entity\Experience $experience = null)
	{
		$this->experience = $experience;

		return $this;
	}

	/**
	 * Get experience
	 *
	 * @return \AppBundle\Entity\Experience
	 */
	public function getExperience()
	{
		return $this->experience;
	}

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */

	/**
	 * Add children
	 *
	 * @param \AppBundle\Entity\ExperiencePoint $children
	 * @return ExperiencePoint
	 */
	public function addChild(\AppBundle\Entity\ExperiencePoint $children)
	{
		$this->children[] = $children;

		return $this;
	}

	/**
	 * Remove children
	 *
	 * @param \AppBundle\Entity\ExperiencePoint $children
	 */
	public function removeChild(\AppBundle\Entity\ExperiencePoint $children)
	{
		$this->children->removeElement($children);
	}

	/**
	 * Get children
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getChildren()
	{
		return $this->children;
	}

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */

	/**
	 * Set parent
	 *
	 * @param \AppBundle\Entity\ExperiencePoint $parent
	 * @return ExperiencePoint
	 */
	public function setParent(\AppBundle\Entity\ExperiencePoint $parent)
	{
		$this->parent = $parent;

		return $this;
	}

	/**
	 * Get parent
	 *
	 * @return \AppBundle\Entity\ExperiencePoint
	 */
	public function getParent()
	{
		return $this->parent;
	}

	function __tostring()
	{
		return sprintf("{XP ID %d: %s|%d}",
			$this->id,
			$this->description,
			$this->parent
		);
	}
}
