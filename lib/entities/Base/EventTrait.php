<?php

namespace Entities\Base;

/**
 * Trait EventTrait
 * @package Entities\Base
 */
trait EventTrait
{
    /**
     * @var array
     */
    private $events = [];

    /**
     * @param $event
     */
    protected function recordEvent($event)
    {
        $this->events[] = $event;
    }

    /**
     * @return array
     */
    public function releaseEvents()
    {
        $events = $this->events;
        $this->events = [];
        return $events;
    }
}
