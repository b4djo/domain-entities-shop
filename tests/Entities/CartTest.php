<?php

namespace Entities;

use Entities\Cart\Cart;
use Entities\Product\Name;
use Entities\Product\Product;
use Entities\Product\ProductId;
use Entities\Product\Products;
use Entities\Product\Status;
use PHPUnit\Framework\TestCase;

/**
 * Class CartTest
 * @package Entities
 */
class CartTest extends TestCase
{
    /**
     * CartTest constructor.
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

    public function testCreateCart()
    {
        $cart = new Cart();

        $this->assertEquals(new Products([]), $cart->getProducts());
        $this->assertInstanceOf(Cart::class, $cart);
    }

    public function testAddNotActiveProduct()
    {
        $cart = new Cart();

        $this->expectExceptionMessage('Not active product, not can was added into cart.');

        $cart->addProduct(
            $product = new Product(
                new ProductId(1),
                new Name('Test product 1'),
                new Status('active_no')
            )
        );
    }

    public function testRemoveProductFromEmptyCart()
    {
        $cart = new Cart();

        $this->expectExceptionMessage('Can not remove the product from the empty shopping cart.');

        $cart->removeProduct(24);
    }
}
