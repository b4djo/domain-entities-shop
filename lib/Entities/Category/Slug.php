<?php

namespace Entities\Category;

/**
 * Class Slug
 * @package Entities\Category
 */
class Slug
{
    /**
     * @var string
     */
    private $value;

    /**
     * Slug constructor.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()/*: string*/
    {
        return $this->value;
    }
}
