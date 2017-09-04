<?php

namespace Entities\Product;

use Entities\Base\AggregateRoot;
use Entities\Base\EventTrait;

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
    }

    /**
     * @param Name $name
     */
    public function rename(Name $name)
    {
        $this->name = $name;
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
}
