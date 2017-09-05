<?php

namespace Entities\Category;

/**
 * Class Categories
 * @package Entities\Category
 */
class Categories
{
    /**
     * @var Category[]
     */
    private $categories;

    /**
     * Categories constructor.
     *
     * @param array $categories
     */
    public function __construct(array $categories)
    {
        foreach ($categories as $category) {
            $this->add($category);
        }
    }

    /**
     * @param Category $category
     */
    public function add(Category $category)
    {
        $this->categories[] = $category;
    }

    /**
     * @param $index
     *
     * @return Category
     */
    public function remove($index)
    {
        if (!isset($this->categories[$index])) {
            throw new \DomainException('Category not found.');
        }

        $product = $this->categories[$index];
        unset($this->categories[$index]);
        return $product;
    }

    /**
     * @return Category[]
     */
    public function getAll()
    {
        return $this->categories;
    }
}
