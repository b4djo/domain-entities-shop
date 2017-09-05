<?php

namespace Entities\Category;

/**
 * Class Description
 * @package Entities\Category
 */
class Description
{
    /**
     * @var string
     */
    private $text;

    /**
     * Description constructor.
     *
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText()/*: string*/
    {
        return $this->text;
    }
}
