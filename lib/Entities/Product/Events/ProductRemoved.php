<?php

namespace Entities\Product\Events;

use Entities\Product\ProductId;

/**
 * Class ProductRemoved
 * @package Entities\Product\Events
 */
class ProductRemoved
{
    /**
     * @var ProductId
     */
    public $productId;

    /**
     * ProductRemoved constructor.
     *
     * @param ProductId $productId
     */
    public function __construct(ProductId $productId)
    {
        $this->productId = $productId;
    }
}
