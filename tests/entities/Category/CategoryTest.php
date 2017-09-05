<?php

namespace Tests\Category;

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

        require_once __DIR__ . '/../../../vendor/autoload.php';
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
        $category1 = CategoryBuilder::instance()->build();
        $category2 = CategoryBuilder::instance()->setParentId($category1->getId()->getId()->toString())->build();

        $this->assertEquals(
            $category1->getId()->getId()->toString(),
            $category2->getParentId()->getId()->getId()->getId()
        );
    }

    public function testAddProduct()
    {
        $category = CategoryBuilder::instance()->withProducts(3)->build();
        $this->assertCount(3, $category->getProducts());
    }

    public function testRenameCategory()
    {
        $category = CategoryBuilder::instance()->build();
        $category->rename($newName = new \Entities\Category\Name('Category NEW'));
        $this->assertEquals($newName, $category->getName());
    }

    public function testChangeCategory()
    {
        $category = CategoryBuilder::instance()->build();

        $category->changeStatus($newStatus = new \Entities\Category\Status('active_no'));

        $this->assertEquals($newStatus, $category->getStatus());
    }
}
