<?php

namespace Entities\Cart;

use Entities\Product\Product;
use Entities\Product\Products;

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
            throw new \DomainException('Not active product, not can was added into cart.');
        }
    }

    /**
     * @param $index
     *
     * @return Product
     */
    public function removeProduct($index)
    {
        if ($this->getCount() === 0) {
            throw new \DomainException('Can not remove the product from the empty shopping cart.');
        }

        return $this->products->remove($index);
    }

    /**
     * @return Products
     */
    public function getProducts()
    {
        return $this->products;
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

    /**
     * @return int
     */
    public function getCount()/*: int*/
    {
        return count($this->products->getAll());
    }
}
