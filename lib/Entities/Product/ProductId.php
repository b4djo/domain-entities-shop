<?php

namespace DesignPatterns\Structural\Facade\Entities\Product;

/**
 * Class ProductId
 * @package DesignPatterns\Structural\Facade\Entities\Product
 */
class ProductId
{
    /**
     * @var int
     */
    private $id;

    /**
     * ProductId constructor.
     *
     * @param int $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()/*: int*/
    {
        return $this->id;
    }
}
