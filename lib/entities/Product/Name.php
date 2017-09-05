<?php

namespace Entities\Product;

/**
 * Class Name
 * @package Entities\Product
 */
class Name
{
    /**
     * @var string
     */
    private $name;

    /**
     * Name constructor.
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()/*: string*/
    {
        return $this->name;
    }
}
