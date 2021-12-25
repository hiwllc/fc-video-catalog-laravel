<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use PHPUnit\Framework\TestCase;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\Uuid;

class CategoryTest extends TestCase
{
    private $category;

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = new Category();
    }

    public function testFillable()
    {
        $this->assertEquals(
            ['name', 'description', 'is_active'],
            $this->category->getFillable()
        );
    }

    public function testUseTraits()
    {
        $traits = [
            SoftDeletes::class,
            Uuid::class,
        ];

        $categoryTraits = array_keys(class_uses(Category::class));

        $this->assertEquals($traits, $categoryTraits);
    }

    public function testCasts()
    {
        $casts = ['id' => 'string'];
        $this->assertEquals(
            $casts,
            $this->category->getCasts(),
        );
    }

    public function testDatesAttributes()
    {
        $dates = ['deleted_at', 'created_at', 'updated_at'];
        foreach($dates as $date) {
            $this->assertContains($date, $this->category->getDates());
        }
        $this->assertCount(count($dates), $this->category->getDates());
    }

    public function testIncrements()
    {
        $this->assertFalse($this->category->incrementing);
    }
}
