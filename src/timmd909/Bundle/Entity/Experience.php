<?php
/**
 * @author Tim Doerzbacher <tim@tim-doerzbacher.com>
 * 
 */

namespace timmd909\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="experiences")
 */
class Experience
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
	 * @ORM\Column(type="string", nullable=true)
	 */
	protected $started;

	/**
	 * @ORM\Column(type="string", nullable=true)
	 */
	protected $ended;

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

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */

    /**
     * Set name
     *
     * @param string $name
     * @return Experience
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * Set description
     *
     * @param string $description
     * @return Experience
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
     * Set started
     *
     * @param string $started
     * @return Experience
     */
    public function setStarted($started)
    {
        $this->started = $started;

        return $this;
    }

    /**
     * Get started
     *
     * @return string 
     */
    public function getStarted()
    {
        return $this->started;
    }

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */

    /**
     * Set ended
     *
     * @param string $ended
     * @return Experience
     */
    public function setEnded($ended)
    {
        $this->ended = $ended;

        return $this;
    }

    /**
     * Get ended
     *
     * @return string 
     */
    public function getEnded()
    {
        return $this->ended;
    }

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */

}
