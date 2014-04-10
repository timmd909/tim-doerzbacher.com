<?php

namespace timmd909\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Key Value store for anything not in the other classes.
 *
 * Only items that have only 1 associate value should be in here
 * (ex: city, state, headline, etc.)
 *
 * @ORM\Entity
 * @ORM\Table(name="key_values")
 */
class KeyValue
{
	/**
	 * @var integer
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", name="the_key")
	 */
	protected $key;

	/**
	 * @ORM\Column(type="text", name="the_value")
	 */
	protected $value;

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
     * Set key
     *
     * @param string $key
     * @return KeyValue
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

	/* -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- */

    /**
     * Set value
     *
     * @param string $value
     * @return KeyValue
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
