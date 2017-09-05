<?php

namespace Entities\Category;

/**
 * Class Title
 * @package Entities\Category
 */
class Title
{
    /**
     * @var string
     */
    private $title;

    /**
     * Title constructor.
     *
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()/*: string*/
    {
        return $this->title;
    }
}
