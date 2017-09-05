<?php

namespace Entities\Category;

use Entities\Product\Product;
use Entities\Product\Products;

/**
 * Class Category
 * @package Entities\Category
 */
class Category
{
    /**
     * @var CategoryId
     */
    private $id;

    /**
     * @var ParentId
     */
    private $parentId;

    /**
     * @var Name
     */
    private $name;

    /**
     * @var Description
     */
    private $description;

    /**
     * @var Title
     */
    private $title;

    /**
     * @var Slug
     */
    private $slug;

    /**
     * @var Products[]
     */
    private $products;

    /**
     * @var Status
     */
    private $status;

    /**
     * Category constructor.
     *
     * @param CategoryId $id
     * @param Name $name
     * @param Description $description
     * @param Title $title
     * @param Slug $slug
     * @param Status $status
     * @param ParentId|null $parentId
     */
    public function __construct(
        CategoryId $id,
        Name $name,
        Description $description,
        Title $title,
        Slug $slug,
        Status $status = null,
        ParentId $parentId = null
    ) {
        $this->id          = $id;
        $this->parentId    = $parentId;
        $this->name        = $name;
        $this->description = $description;
        $this->title       = $title;
        $this->slug        = $slug;

        if ($status) {
            $this->status = $status;
        } else {
            $this->status = new Status('active_yes');
        }

        if ($parentId) {
            $this->parentId = $parentId;
        } else {
            $this->parentId = new ParentId(
                new CategoryId(CategoryId::ROOT)
            );
        }
    }

    /**
     * @return CategoryId
     */
    public function getId()/*: CategoryId*/
    {
        return $this->id;
    }

    /**
     * @return ParentId
     */
    public function getParentId()/*: ParentId*/
    {
        return $this->parentId;
    }

    /**
     * @return Name
     */
    public function getName()/*: Name*/
    {
        return $this->name;
    }

    /**
     * @return Description
     */
    public function getDescription()/*: Description*/
    {
        return $this->description;
    }

    /**
     * @return Title
     */
    public function getTitle()/*: Title*/
    {
        return $this->title;
    }

    /**
     * @return Slug
     */
    public function getSlug()/*: Slug*/
    {
        return $this->slug;
    }

    /**
     * @return Products[]
     */
    public function getProducts()/*: array*/
    {
        return $this->products;
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->status->isActive();
    }

    /**
     * @param Name $name
     */
    public function rename(Name $name)
    {
        $this->name = $name;
    }

    /**
     * @param Status $status
     */
    public function changeStatus(Status $status)
    {
        $this->status = $status;
    }

    /**
     * @return Status
     */
    public function getStatus()/*: Status*/
    {
        return $this->status;
    }

    /**
     * @param string $parentId
     */
    public function setParentId(string $parentId)
    {
        $this->parentId = new ParentId(new CategoryId($parentId));
    }
}
