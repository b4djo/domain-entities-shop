<?php

namespace Tests\Category;

use Entities\Category\Category;
use Entities\Category\CategoryId;
use Entities\Category\Description;
use Entities\Category\Name;
use Entities\Category\Slug;
use Entities\Category\Status;
use Entities\Category\Title;
use Ramsey\Uuid\Uuid;
use Tests\Product\ProductBuilder;

/**
 * Class CategoryBuilder
 * @package entities\Category
 */
class CategoryBuilder
{
    /**
     * @var bool
     */
    private $active = true;

    /**
     * @var string
     */
    private $parentId;

    /**
     * @var array
     */
    private $products = [];

    /**
     * @return CategoryBuilder
     */
    public static function instance()
    {
        return new self();
    }

    /**
     * @return $this
     */
    public function nonActive()
    {
        $this->active = false;
        return $this;
    }

    /**
     * @param $parentId
     *
     * @return $this
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * @return $this
     */
    public function addProduct()
    {
        $this->products[] = ProductBuilder::instance()->build();
        return $this;
    }

    /**
     * @param int $count
     *
     * @return $this
     */
    public function withProducts($count = 5)
    {
        $i = 0;
        while ($i < $count) {
            $this->products[] = ProductBuilder::instance()->build();
            $i++;
        }
        return $this;
    }

    /**
     * @return Category
     */
    public function build()
    {
        $category = new Category(
            $categoryId     = new CategoryId(Uuid::uuid4()),
            $name           = new Name('Category 1'),
            $description    = new Description('Description 1'),
            $title          = new Title('Title 1'),
            $slug           = new Slug('Slug category 1')
        );

        if (!$this->active) {
            $category->changeStatus(Status::STATUS_ACTIVE_NO);
        }

        if ($this->parentId) {
            $category->setParentId($this->parentId);
        }

        if ($this->products) {
            foreach ($this->products as $product) {
                $category->addProduct($product);
            }
        }

        return $category;
    }
}
