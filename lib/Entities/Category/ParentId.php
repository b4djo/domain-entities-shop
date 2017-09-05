<?php

namespace Entities\Category;

/**
 * Class ParentId
 * @package Entities\Category
 */
class ParentId
{
    /**
     * @var CategoryId
     */
    private $id;

    /**
     * ParentId constructor.
     *
     * @param CategoryId $id
     */
    public function __construct(CategoryId $id)
    {
        $this->id = new CategoryId($id);
    }

    /**
     * @return CategoryId
     */
    public function getId()/*: CategoryId*/
    {
        return $this->id;
    }
}
