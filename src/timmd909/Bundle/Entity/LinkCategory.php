<?php
/**
 * @author Tim Doerzbacher <tim@tim-doerzbacher.com>
 * 
 */

namespace timmd909\Bundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="link_categories")
 */
class LinkCategory
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
	 * @ORM\Column(type="integer")
	 */
	protected $weight = -1;
	
	/**
	 * @ORM\OneToMany(targetEntity="Link", mappedBy="linkCategory")
	 */
	protected $links;
	

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */	

	public function __construct() {
        $this->links = new ArrayCollection();
    }
	
	function __toString()
	{
		return sprintf("Link Category: '%s' (%d)",
			$this->name, $this->weight);
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
     * Set name
     *
     * @param string $name
     * @return LinkCategory
     */
    public function setName($categoryName)
    {
        $this->name = $categoryName;

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
     * Set categoryWeight
     *
     * @param string $weight
     * @return LinkCategory
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get categoryWeight
     *
     * @return string 
     */
    public function getWeight()
    {
        return $this->weight;
    }

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */	

    /**
     * Add links
     *
     * @param \timmd909\Bundle\Entity\Link $links
     * @return LinkCategory
     */
    public function addLink(\timmd909\Bundle\Entity\Link $links)
    {
        $this->links[] = $links;

        return $this;
    }

    /**
     * Remove links
     *
     * @param \timmd909\Bundle\Entity\Link $links
     */
    public function removeLink(\timmd909\Bundle\Entity\Link $links)
    {
        $this->links->removeElement($links);
    }

    /**
     * Get links
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLinks()
    {
        return $this->links;
    }
}
