<?php

namespace Entities\Cart\Events;

use Entities\Product\Product;

/**
 * Class CartDeleteProduct
 * @package DesignPatterns\Structural\Facade\Entities\Cart\Events
 */
class CartRemoveProduct
{
    /**
     * @var Product
     */
    public $product;

    /**
     * CartRemoveProduct constructor.
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
}
