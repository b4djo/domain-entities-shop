<?php

namespace Tests\Entities;

use Entities\Product\Events\ProductCreated;
use Entities\Product\Name;
use Entities\Product\Product;
use Entities\Product\ProductId;
use Entities\Product\Status;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

/**
 * Class ProductTest
 * @package Tests\Entities
 */
class ProductTest extends TestCase
{
    /**
     * ProductTest constructor.
     *
     * @param null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        require_once __DIR__ . '/../../vendor/autoload.php';
    }

    public function testCreateProduct()
    {
        $product = new Product(
            $id     = new ProductId(Uuid::uuid4()),
            $name   = new Name('Product 1'),
            $status = new Status('active_yes')
        );

        $this->assertEquals($id, $product->getId());
        $this->assertEquals($name, $product->getName());
        $this->assertEquals($status, $product->getStatus());

        $this->assertTrue($product->isActive());
        $this->assertNotNull($product->getCreateDate());

        $this->assertNotEmpty($events = $product->releaseEvents());
        $this->assertInstanceOf(ProductCreated::class, end($events));

        $this->assertInstanceOf(Product::class, $product);
    }

    public function testCreateProductWithNotExistStatus()
    {
        $product = new Product(
            new ProductId(Uuid::uuid4()),
            new Name('Product 2'),
            new Status('incorrect_status')
        );

        $this->assertEquals(Status::STATUS_ACTIVE_NO, $product->getStatus()->getValue());
    }

    public function testRenameProduct()
    {
        $product = new Product(
            new ProductId(Uuid::uuid4()),
            new Name('Product 3'),
            new Status('active_no')
        );

        $product->rename($newName = new Name('Product 4'));

        $this->assertEquals($newName, $product->getName());
    }

    public function testChangeStatus()
    {
        $product = new Product(
            new ProductId(Uuid::uuid4()),
            new Name('Product 5'),
            new Status('active_yes')
        );

        $product->changeStatus($newStatus = new Status('active_no'));

        $this->assertEquals($newStatus, $product->getStatus());
    }
}
