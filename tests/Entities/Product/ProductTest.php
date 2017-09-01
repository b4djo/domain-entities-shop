<?php

namespace Tests\Structural\Facade;

use Entities\Product\Name;
use Entities\Product\Product;
use Entities\Product\ProductId;
use Entities\Product\Status;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testCreateProduct()
    {
        require_once __DIR__ . '/../../../vendor/autoload.php';

        $product = new Product(
            new ProductId(1),
            new Name('Test product 1'),
            new Status('active_yes')
        );
        $this->assertInstanceOf(Product::class, $product);
    }
}
