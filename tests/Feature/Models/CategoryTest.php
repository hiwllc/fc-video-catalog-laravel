<?php

// namespace Tests\Feature\Models;

// use App\Models\Category;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
// use Tests\TestCase;

/**
 * @TODO testar uuid na criação.
 * @TODO testar exclusão da categoria.
 */
// class CategoryTest extends TestCase
// {
//     use DatabaseMigrations;

//     public function testList()
//     {
//         factory(Category::class, 1)->create();
//         $categories = Category::all();

//         $this->assertCount(1, $categories);
//     }

//     public function testCreate()
//     {
//         $category = Category::create([
//             'name' => 'Category'
//         ]);

//         $category->refresh();

//         $this->assertEquals('Category', $category->name);
//         $this->assertNull($category->description);
//         $this->assertTrue($category->is_active);
//     }

//     public function testUpdate()
//     {
//         /** @var Category $category */
//         $category = factory(Category::class)->create([
//             'description' => 'test description',
//             'is_active' => false,
//         ])->first();

//         $data = [
//             'name' => 'test name',
//             'description' => 'test desc',
//             'is_active' => true,
//         ];

//         $category->update($data);

//         foreach($data as $key => $value) {
//             $this->assertEquals($value, $category->{$key});
//         }
//     }
// }
