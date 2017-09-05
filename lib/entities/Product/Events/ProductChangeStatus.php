<?php

namespace Entities\Product\Events;

use Entities\Product\ProductId;
use Entities\Product\Status;

/**
 * Class ProductChangeStatus
 * @package Entities\Product
 */
class ProductChangeStatus
{
    /**
     * @var ProductId
     */
    private $productId;

    /**
     * @var Status
     */
    private $status;

    /**
     * ProductChangeStatus constructor.
     *
     * @param $productId
     * @param $status
     */
    public function __construct($productId, $status)
    {
        $this->productId = $productId;
        $this->status = $status;
    }
}
