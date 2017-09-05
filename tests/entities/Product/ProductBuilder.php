<?php

namespace Tests\Product;

use Entities\Product\Name;
use Entities\Product\Product;
use Entities\Product\ProductId;
use Entities\Product\Status;
use Ramsey\Uuid\Uuid;

class ProductBuilder
{
    /**
     * @var bool
     */
    private $active = true;

    /**
     * @return ProductBuilder
     */
    public static function instance()
    {
        return new self();
    }

    /**
     * @return $this
     */
    public function nonActive()
    {
        $this->active = false;
        return $this;
    }

    /**
     * @return Product
     */
    public function build()
    {
        $product = new Product(
            new ProductId(Uuid::uuid4()),
            new Name('Product 1'),
            new Status('active_yes')
        );

        if (!$this->active) {
            $product->changeStatus(new Status(Status::STATUS_ACTIVE_NO));
        }

        return $product;
    }
}
