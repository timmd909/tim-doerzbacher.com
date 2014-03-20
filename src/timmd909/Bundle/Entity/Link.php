<?php
/**
 * @author Tim Doerzbacher <tim@tim-doerzbacher.com>
 * 
 */

namespace timmd909\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="link")
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
	protected $linkName;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $linkDescription;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $linkTarget;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $linkWeight = -1;
	
	/**
	 * @ORM\ManyToOne(targetEntity="LinkCategory", inversedBy="links")
	 * @ORM\JoinColumn(name="link_category_id", referencedColumnName="id")
	 */
	protected $linkCategory;
	
	/**
	 * @ORM\Column(type="string", nullable=true)
	 */
	protected $linkBackground;

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
     * Set linkName
     *
     * @param string $linkName
     * @return Link
     */
    public function setLinkName($linkName)
    {
        $this->linkName = $linkName;

        return $this;
    }

    /**
     * Get linkName
     *
     * @return string 
     */
    public function getLinkName()
    {
        return $this->linkName;
    }

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */	

    /**
     * Set linkCategory
     *
     * @param \timmd909\Bundle\Entity\LinkCategory $linkCategory
     * @return Link
     */
    public function setLinkCategory(\timmd909\Bundle\Entity\LinkCategory $linkCategory = null)
    {
        $this->linkCategory = $linkCategory;

        return $this;
    }

    /**
     * Get linkCategory
     *
     * @return \timmd909\Bundle\Entity\LinkCategory 
     */
    public function getLinkCategory()
    {
        return $this->linkCategory;
    }

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */	

	/**
     * Set linkTarget
     *
     * @param string $linkTarget
     * @return Link
     */
    public function setLinkTarget($linkTarget)
    {
        $this->linkTarget = $linkTarget;

        return $this;
    }

    /**
     * Get linkTarget
     *
     * @return string 
     */
    public function getLinkTarget()
    {
        return $this->linkTarget;
    }

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */	

    /**
     * Set linkWeight
     *
     * @param string $linkWeight
     * @return Link
     */
    public function setLinkWeight($linkWeight)
    {
        $this->linkWeight = $linkWeight;

        return $this;
    }

    /**
     * Get linkWeight
     *
     * @return string 
     */
    public function getLinkWeight()
    {
        return $this->linkWeight;
    }

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */	

    /**
     * Set linkDescription
     *
     * @param string $linkDescription
     * @return Link
     */
    public function setLinkDescription($linkDescription)
    {
        $this->linkDescription = $linkDescription;

        return $this;
    }

    /**
     * Get linkDescription
     *
     * @return string 
     */
    public function getLinkDescription()
    {
        return $this->linkDescription;
    }

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */	

    /**
     * Set linkBackground
     *
     * @param string $linkBackground
     * @return Link
     */
    public function setLinkBackground($linkBackground)
    {
        $this->linkBackground = $linkBackground;

        return $this;
    }

    /**
     * Get linkBackground
     *
     * @return string 
     */
    public function getLinkBackground()
    {
        return $this->linkBackground;
    }
}
