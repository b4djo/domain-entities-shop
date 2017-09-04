<?php

namespace Repositories;

use Entities\Product\Product;
use Entities\Product\ProductId;

/**
 * Class ProductRepository
 * @package Services
 */
interface ProductRepositoryInterface
{
    /**
     * @param ProductId $id
     *
     * @return Product
     */
    public function get(ProductId $id);

    /**
     * @param Product $product
     *
     * @return mixed
     */
    public function add(Product $product);

    /**
     * @param Product $product
     *
     * @return mixed
     */
    public function save(Product $product);

    /**
     * @param Product $product
     *
     * @return mixed
     */
    public function remove(Product $product);

    /**
     * @return ProductId
     */
    public function nextId();
}
