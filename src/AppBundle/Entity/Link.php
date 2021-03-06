<?php
/**
 * @author Tim Doerzbacher <tim@tim-doerzbacher.com>
 *
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="links")
 */
class Link
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
	protected $name;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $description;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $target;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $weight = -1;

	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $external = true;

	/**
	 * @ORM\ManyToOne(targetEntity="LinkCategory", inversedBy="links")
	 * @ORM\JoinColumn(name="link_category_id", referencedColumnName="id")
	 */
	protected $category;

	/**
	 * @ORM\Column(type="string", nullable=true)
	 */
	protected $image;

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set name
	 *
	 * @param string $linkName
	 * @return Link
	 */
	public function setName($linkName)
	{
		$this->name = $linkName;

		return $this;
	}

	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */

	/**
	 * Set category
	 *
	 * @param \AppBundle\Entity\LinkCategory $linkCategory
	 * @return Link
	 */
	public function setCategory(\AppBundle\Entity\LinkCategory $linkCategory = null)
	{
		$this->category = $linkCategory;

		return $this;
	}

	/**
	 * Get category
	 *
	 * @return \AppBundle\Entity\LinkCategory
	 */
	public function getCategory()
	{
		return $this->category;
	}

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */

	/**
	 * Set linkTarget
	 *
	 * @param string $target
	 * @return Link
	 */
	public function setTarget($target)
	{
		$this->target = $target;

		return $this;
	}

	/**
	 * Get target
	 *
	 * @return string
	 */
	public function getTarget()
	{
		return $this->target;
	}

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */

	/**
	 * Set weight
	 *
	 * @param string $linkWeight
	 * @return Link
	 */
	public function setWeight($linkWeight)
	{
		$this->weight = $linkWeight;

		return $this;
	}

	/**
	 * Get weight
	 *
	 * @return string
	 */
	public function getWeight()
	{
		return $this->weight;
	}

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */

	/**
	 * Set whether a link is external
	 *
	 * @param string $linkWeight
	 * @return Link
	 */
	public function setExternal($external)
	{
		$this->external = $external;

		return $this;
	}

	/**
	 * Get if a link is external
	 *
	 * @return string
	 */
	public function getExternal()
	{
		return $this->external;
	}

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */

	/**
	 * Set linkDescription
	 *
	 * @param string $linkDescription
	 * @return Link
	 */
	public function setDescription($linkDescription)
	{
		$this->description = $linkDescription;

		return $this;
	}

	/**
	 * Get linkDescription
	 *
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */

	/**
	 * Set iamge
	 *
	 * @param string $image
	 * @return Link
	 */
	public function setImage($image)
	{
		$this->image = $image;

		return $this;
	}

	/**
	 * Get image
	 *
	 * @return string
	 */
	public function getImage()
	{
		return $this->image;
	}
}
