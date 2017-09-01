<?php

namespace DesignPatterns\Structural\Facade\Entities\Cart;

use DesignPatterns\Structural\Facade\Entities\Product\Product;
use DesignPatterns\Structural\Facade\Entities\Product\Products;

/**
 * Class Cart
 * @package DesignPatterns\Structural\Facade
 */
class Cart
{
    /**
     * @var Products
     */
    private $products;

    /**
     * Cart constructor.
     */
    public function __construct()
    {
        $this->products = new Products([]);
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product)
    {
        $this->checkProduct($product);
        $this->products->add($product);
    }

    /**
     * @param Product $product
     */
    private function checkProduct(Product $product)
    {
        if (!$product->isActive()) {
            throw new \DomainException('Product is not active.');
        }
    }

    /**
     * @param $index
     *
     * @return Product
     */
    public function removeProduct($index)
    {
        return $this->products->remove($index);
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products->getAll();
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return !$this->products;
    }


    public function clear()
    {
        $this->products = [];
    }
}
