<?php

namespace Entities\Product\Events;

use Entities\Product\ProductId;

/**
 * Class ProductCreated
 * @package Entities\Product
 */
class ProductCreated
{
    /**
     * @var ProductId
     */
    public $productId;

    /**
     * ProductCreated constructor.
     *
     * @param ProductId $productId
     */
    public function __construct(ProductId $productId)
    {
        $this->productId = $productId;
    }
}
