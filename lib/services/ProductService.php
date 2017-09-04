<?php

namespace Services;

use Entities\Product\Name;
use Entities\Product\Product;
use Entities\Product\ProductId;
use Entities\Product\Status;
use Repositories\EventDispatcher;
use Repositories\ProductRepositoryInterface;

/**
 * Class ProductService
 * @package Services
 */
class ProductService
{
    /**
     * @var ProductRepositoryInterface
     */
    private $products;

    /**
     * @var EventDispatcher
     */
    private $dispatcher;

    /**
     * ProductService constructor.
     *
     * @param ProductRepositoryInterface $products
     * @param EventDispatcher $dispatcher
     */
    public function __construct(ProductRepositoryInterface $products, EventDispatcher $dispatcher)
    {
        $this->products = $products;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param ProductCreateDto $dto
     */
    public function create(ProductCreateDto $dto)
    {
        $product = new Product(
            $this->products->nextId(),
            new Name($dto->name),
            new Status($dto->status)
        );

        $this->products->add($product);
        $this->dispatcher->dispatch($product->releaseEvents());
    }

    /**
     * @param ProductId $id
     * @param string $name
     */
    public function rename(ProductId $id, string $name)
    {
        $product = $this->products->get($id);
        $product->rename(new Name($name));
        $this->products->save($product);
        $this->dispatcher->dispatch($product->releaseEvents());
    }

    /**
     * @param ProductId $id
     * @param Status $status
     */
    public function changeStatus(ProductId $id, Status $status)
    {
        $product = $this->products->get($id);
        $product->changeStatus($status);
        $this->products->save($product);
        $this->dispatcher->dispatch($product->releaseEvents());
    }

    /**
     * @param ProductId $id
     */
    public function remove(ProductId $id)
    {
        $product = $this->products->get($id);
        $product->remove();
        $this->products->remove($product);
        $this->dispatcher->dispatch($product->releaseEvents());
    }
}
