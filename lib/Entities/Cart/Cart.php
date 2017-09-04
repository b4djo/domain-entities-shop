<?php

namespace Entities\Cart;

use Entities\Base\AggregateRoot;
use Entities\Base\EventTrait;
use Entities\Cart\Events\CartCreated;
use Entities\Cart\Events\CartRemoveProduct;
use Entities\Product\Product;
use Entities\Product\Products;

/**
 * Class Cart
 * @package DesignPatterns\Structural\Facade
 */
class Cart implements AggregateRoot
{
    use EventTrait;

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
        $this->recordEvent(new CartCreated());
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
     * @param int $index
     */
    public function removeProduct($index)
    {
        if ($this->getCount() === 0) {
            throw new \DomainException('Can not remove the product from the empty shopping cart.');
        }

        $product = $this->products->remove($index);

        $this->recordEvent(new CartRemoveProduct($product));
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

    public function getId()
    {
        return null;
    }
}
