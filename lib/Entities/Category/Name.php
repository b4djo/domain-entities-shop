<?php

namespace Entities\Category;

/**
 * Class Name
 * @package Entities\Category
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
    public function __construct(string $name)
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
