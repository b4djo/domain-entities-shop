<?php

namespace DesignPatterns\Structural\Facade\Entities\Product;

/**
 * Class Status
 * @package DesignPatterns\Structural\Facade\Entities\Product
 */
class Status
{
    const STATUS_ACTIVE_YES = 'active_yes';
    const STATUS_ACTIVE_NO  = 'active_no';

    /**
     * @var string
     */
    private $value;

    /**
     * Status constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()/*: string*/
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->value === self::STATUS_ACTIVE_YES ? true : false;
    }
}
