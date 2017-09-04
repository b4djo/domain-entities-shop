<?php

namespace Repositories;

use Entities\Product\Product;
use Entities\Product\ProductId;
use Ramsey\Uuid\Uuid;

/**
 * Class MemoryProductRepository
 * @package Repositories
 */
class MemoryProductRepository implements ProductRepositoryInterface
{

    /**
     * @param ProductId $id
     *
     * @return Product
     */
    public function get(ProductId $id)
    {
        // TODO: Implement get() method.
    }

    /**
     * @param Product $product
     *
     * @return mixed
     */
    public function add(Product $product)
    {
        // TODO: Implement add() method.
    }

    /**
     * @param Product $product
     *
     * @return mixed
     */
    public function save(Product $product)
    {
        // TODO: Implement save() method.
    }

    /**
     * @param Product $product
     *
     * @return mixed
     */
    public function remove(Product $product)
    {
        // TODO: Implement remove() method.
    }

    /**
     * @return ProductId
     */
    public function nextId()
    {
        return new ProductId(Uuid::uuid4()->toString());
    }
}
