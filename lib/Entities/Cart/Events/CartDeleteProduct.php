<?php

namespace Entities\Cart\Events;

use Entities\Product\ProductId;

/**
 * Class CartDeleteProduct
 * @package DesignPatterns\Structural\Facade\Entities\Cart\Events
 */
class CartDeleteProduct
{
    /**
     * @var ProductId
     */
    public $productId;

    /**
     * CartDeleteProduct constructor.
     *
     * @param ProductId $productId
     */
    public function __construct(ProductId $productId)
    {
        $this->productId = $productId;
    }
}
