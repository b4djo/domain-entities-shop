<?php

namespace Entities\Base;

/**
 * Interface AggregateRoot
 * @package Entities\Base
 */
interface AggregateRoot
{
    public function getId();

    public function releaseEvents();
}
