<?php

namespace Entities\Base;

abstract class Status
{
    const STATUS_ACTIVE_YES = 'active_yes';
    const STATUS_ACTIVE_NO  = 'active_no';

    const LIST_STATUSES = [
        self::STATUS_ACTIVE_YES => 'активен',
        self::STATUS_ACTIVE_NO  => 'неактивен',
    ];

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

        if (!in_array($value, array_flip(self::LIST_STATUSES))) {
            $this->value = self::STATUS_ACTIVE_NO;
        }
    }

    /**
     * @return string
     */
    public function getValue()/*: string*/
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->value === self::STATUS_ACTIVE_YES ? true : false;
    }
}
