<?php

namespace Entities\Product;

use Entities\Base\AggregateRoot;
use Entities\Base\EventTrait;
use Entities\Product\Events\ProductChangeStatus;
use Entities\Product\Events\ProductCreated;
use Entities\Product\Events\ProductRemoved;
use Entities\Product\Events\ProductRenamed;

/**
 * Class Product
 * @package DesignPatterns\Structural\Facade
 */
class Product implements AggregateRoot
{
    use EventTrait;

    /**
     * @var ProductId
     */
    private $id;

    /**
     * @var Name
     */
    private $name;

    /**
     * @var Status
     */
    private $status;

    /**
     * @var \DateTimeImmutable
     */
    private $createDate;

    /**
     * Product constructor.
     *
     * @param ProductId $id
     * @param Name $name
     * @param Status $status
     */
    public function __construct(ProductId $id, Name $name, Status $status)
    {
        $this->id   = $id;
        $this->name = $name;
        $this->status = $status;
        $this->createDate = new \DateTimeImmutable();
        $this->recordEvent(new ProductCreated($this->id));
    }

    /**
     * @param Name $name
     */
    public function rename(Name $name)
    {
        $this->name = $name;
        $this->recordEvent(new ProductRenamed($this->id, $name));
    }

    /**
     * @param Status $status
     */
    public function changeStatus(Status $status)
    {
        $this->status = $status;
        $this->recordEvent(new ProductChangeStatus($this->id, $status));
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->status->isActive();
    }

    /**
     * @return Status
     */
    public function getStatus()/*: Status*/
    {
        return $this->status;
    }

    /**
     * @return ProductId
     */
    public function getId()/*: ProductId*/
    {
        return $this->id;
    }

    /**
     * @return Name
     */
    public function getName()/*: Name*/
    {
        return $this->name;
    }

    public function remove()
    {
        $this->recordEvent(new ProductRemoved($this->id));
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreateDate()/*: \DateTimeImmutable*/
    {
        return $this->createDate;
    }
}
