<?php

namespace Tests\Structural\Facade;

use Entities\Product\Name;
use Entities\Product\Product;
use Entities\Product\ProductId;
use Entities\Product\Status;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        require_once __DIR__ . '/../../../vendor/autoload.php';
    }

    public function testCreateProduct()
    {
        $product = new Product(
            new ProductId(1),
            new Name('Test product 1'),
            new Status('active_yes')
        );

        $this->assertInstanceOf(Product::class, $product);
    }

    public function testCreateProductWithNotExistStatus()
    {
        $product = new Product(
            new ProductId(2),
            new Name('Test product 2'),
            new Status('waiting') // incorrect status
        );

        $this->assertEquals(
            Status::STATUS_ACTIVE_NO,
            $product->getStatus()->getValue(),
            'Неправильное присваивание статуса при несуществующем статусе'
        );
    }
}
