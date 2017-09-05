<?php

namespace Entities;

use Entities\Category\Category;
use Entities\Category\CategoryId;
use Entities\Category\Description;
use Entities\Category\ParentId;
use Entities\Category\Slug;
use Entities\Category\Title;
use Entities\Product\Product;
use Entities\Product\ProductId;
use Entities\Product\Status;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class CategoryTest extends TestCase
{
    /**
     * CategoryTest constructor.
     *
     * @param null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        require_once __DIR__ . '/../../vendor/autoload.php';
    }

    public function testCreateRootCategory()
    {
        $category = new Category(
            $categoryId     = new CategoryId(Uuid::uuid4()),
            $name           = new \Entities\Category\Name('Category 1'),
            $description    = new Description('Description 1'),
            $title          = new Title('Title 1'),
            $slug           = new Slug('Slug category 1'),
            $status         = new \Entities\Category\Status('active_yes')
        );

        $this->assertEquals($categoryId, $category->getId());
        $this->assertEquals($name, $category->getName());
        $this->assertEquals($description, $category->getDescription());
        $this->assertEquals($title, $category->getTitle());
        $this->assertEquals($slug, $category->getSlug());

        $this->assertTrue($category->isActive());

        $this->assertEquals(new ParentId(new CategoryId(CategoryId::ROOT)), $category->getParentId());
        $this->assertInstanceOf(Category::class, $category);
    }

    public function testCreateSubCategory()
    {
        $category1 = new Category(
            $categoryId1    = new CategoryId(Uuid::uuid4()),
            $name1          = new \Entities\Category\Name('Category 2'),
            $description1   = new Description('Description 2'),
            $title1         = new Title('Title 2'),
            $slug1          = new Slug('Slug category 2'),
            $status1        = new \Entities\Category\Status('active_yes')
        );

        $category2 = new Category(
            $categoryId2    = new CategoryId(Uuid::uuid4()),
            $name2          = new \Entities\Category\Name('Category 3'),
            $description2   = new Description('Description 3'),
            $title2         = new Title('Title 3'),
            $slug2          = new Slug('Slug category 3'),
            $status2        = new \Entities\Category\Status('active_yes'),
            $parentID2      = new ParentId($categoryId1)
        );

        $this->assertEquals(
            $category1->getId()->getId()->toString(),
            $category2->getParentId()->getId()->getId()->getId()->toString()
        );
    }

    public function testAddProduct()
    {
        $category = new Category(
            new CategoryId(Uuid::uuid4()),
            new \Entities\Category\Name('Category 4'),
            new Description('Description 4'),
            new Title('Title 4'),
            new Slug('Slug category 4'),
            new \Entities\Category\Status('active_yes')
        );

        $category->addProduct(new Product(
            new ProductId(Uuid::uuid4()),
            new \Entities\Product\Name('Product 1'),
            new Status('active_yes')
        ));

        $category->addProduct(new Product(
            new ProductId(Uuid::uuid4()),
            new \Entities\Product\Name('Product 2'),
            new Status('active_no')
        ));

        $category->addProduct(new Product(
            new ProductId(Uuid::uuid4()),
            new \Entities\Product\Name('Product 3'),
            new Status('active_yes')
        ));

        $this->assertCount(3, $category->getProducts());
    }

    public function testRenameCategory()
    {
        $category = new Category(
            new CategoryId(Uuid::uuid4()),
            new \Entities\Category\Name('Category 4'),
            new Description('Description 4'),
            new Title('Title 4'),
            new Slug('Slug category 4'),
            new \Entities\Category\Status('active_yes')
        );

        $category->rename($newName = new \Entities\Category\Name('Category 5'));

        $this->assertEquals($newName, $category->getName());
    }

    public function testChangeCategory()
    {
        $category = new Category(
            new CategoryId(Uuid::uuid4()),
            new \Entities\Category\Name('Category 4'),
            new Description('Description 4'),
            new Title('Title 4'),
            new Slug('Slug category 4'),
            new \Entities\Category\Status('active_yes')
        );

        $category->changeStatus($newStatus = new \Entities\Category\Status('active_no'));

        $this->assertEquals($newStatus, $category->getStatus());
    }
}
