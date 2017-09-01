<?php

namespace DesignPatterns\Structural\Facade\Entities\Product;

/**
 * Class Products
 * @package DesignPatterns\Structural\Facade\Entities\Product
 */
class Products
{
    /**
     * @var Product[]
     */
    private $products;

    /**
     * Products constructor.
     *
     * @param array $products
     */
    public function __construct(array $products)
    {
        foreach ($products as $product) {
            $this->add($product);
        }
    }

    /**
     * @param Product $product
     */
    public function add(Product $product)
    {
        $this->products[] = $product;
    }

    /**
     * @param $index
     *
     * @return Product
     */
    public function remove($index)
    {
        if (!isset($this->products[$index])) {
            throw new \DomainException('Product not found.');
        }

        $product = $this->products[$index];
        unset($this->products[$index]);
        return $product;
    }

    /**
     * @return Product[]
     */
    public function getAll()
    {
        return $this->products;
    }
}
