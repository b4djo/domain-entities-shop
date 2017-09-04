<?php

namespace Entities\Base;

use Assert\Assertion;

/**
 * Class Id
 * @package Entities\Base
 */
abstract class Id
{
    /**
     * @var null
     */
    protected $id;

    /**
     * Id constructor.
     *
     * @param null $id
     */
    public function __construct($id = null)
    {
        Assertion::notEmpty($id);
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Id $other
     *
     * @return bool
     */
    public function isEqualTo(self $other)
    {
        return $this->getId() === $other->getId();
    }

}
