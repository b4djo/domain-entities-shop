<?php

namespace Entities\Order;

use Entities\User\User;

/**
 * Class Order
 * @package Entities\Order
 */
class Order
{
    /**
     * @var OrderId
     */
    private $orderId;

    /**
     * @var User
     */
    private $user;

    /**
     * @var \DateTimeImmutable
     */
    private $createDate;

    /**
     * @var Items
     */
    private $items;

    /**
     * Order constructor.
     *
     * @param OrderId $orderId
     * @param User $user
     * @param \DateTimeImmutable $createDate
     * @param Items $items
     */
    public function __construct(OrderId $orderId, User $user, \DateTimeImmutable $createDate, Items $items)
    {
        $this->user       = $user;
        $this->createDate = $createDate;
        $this->items      = $items;
    }

    public function load()
    {
    }

    public function getItems()
    {
    }

    public function getItemCount()
    {
    }

    public function addItem()
    {
    }

    public function deleteItem()
    {
    }
}
