<?php

namespace Entities\Order;

use Entities\Product\Product;

/**
 * Class Items
 * @package Entities\Order
 */
class Items
{
    /**
     * @var Product[]
     */
    private $product;

    /**
     * Items constructor.
     *
     * @param array $products
     */
    public function __construct(array $products)
    {
        $this->product = $products;
    }

    /**
     * @return Product[]
     */
    public function getProduct(): array
    {
        return $this->product;
    }
}
