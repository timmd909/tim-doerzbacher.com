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
 * @ORM\Table(name="link_category")
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
	protected $categoryName;

	/**
	 * @ORM\Column(type="integer")
	 */
	protected $categoryWeight = -1;
	
	/**
	 * @ORM\OneToMany(targetEntity="Link", mappedBy="linkCategory")
	 */
	protected $links;
	

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */	

	public function __construct() {
        $this->links = new ArrayCollection();
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
     * Set categoryName
     *
     * @param string $categoryName
     * @return LinkCategory
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    /**
     * Get categoryName
     *
     * @return string 
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }
	
	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */

    /**
     * Set categoryWeight
     *
     * @param string $categoryWeight
     * @return LinkCategory
     */
    public function setCategoryWeight($categoryWeight)
    {
        $this->categoryWeight = $categoryWeight;

        return $this;
    }

    /**
     * Get categoryWeight
     *
     * @return string 
     */
    public function getCategoryWeight()
    {
        return $this->categoryWeight;
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
