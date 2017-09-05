<?php

namespace Entities\Product\Events;

use Entities\Product\Name;
use Entities\Product\ProductId;

/**
 * Class ProductRenamed
 * @package Entities\Product
 */
class ProductRenamed
{
    /**
     * @var ProductId
     */
    public $productId;

    /**
     * @var Name
     */
    public $name;

    /**
     * ProductRemoved constructor.
     *
     * @param ProductId $productId
     * @param Name $name
     */
    public function __construct(ProductId $productId, Name $name)
    {
        $this->productId = $productId;
        $this->name = $name;
    }
}
