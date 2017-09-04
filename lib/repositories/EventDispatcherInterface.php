<?php

namespace Repositories;

/**
 * Interface EventDispatcher
 * @package Repositories
 */
interface EventDispatcher
{
    /**
     * @param array $events
     *
     * @return mixed
     */
    public function dispatch(array $events);
}
