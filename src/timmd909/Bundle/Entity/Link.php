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
	 * @ORM\Column(type="integer")
	 * 
	 */
	protected $linkCategory;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $linkName;

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
     * Set linkCategory
     *
     * @param integer $linkCategory
     * @return Link
     */
    public function setLinkCategory($linkCategory)
    {
        $this->linkCategory = $linkCategory;

        return $this;
    }

    /**
     * Get linkCategory
     *
     * @return integer 
     */
    public function getLinkCategory()
    {
        return $this->linkCategory;
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
}
