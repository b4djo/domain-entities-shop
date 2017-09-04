<?php

namespace Entities\Product\Events;

use Entities\Product\ProductId;

class ProductRemoved
{
    /**
     * ProductRemoved constructor.
     *
     * @param ProductId $id
     */
    public function __construct($id)
    {
    }
}
