<?php

namespace Tests\Feature\Models;

use App\Models\Genre;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class GenreTest extends TestCase
{
    use DatabaseMigrations;

    public function testList()
    {
        factory(Genre::class, 1)->create();
        $genres = Genre::all();

        $this->assertCount(1, $genres);

        $categoryKeys = array_keys($genres->first()->getAttributes());
        $this->assertEqualsCanonicalizing(['id', 'name', 'is_active', 'created_at', 'updated_at', 'deleted_at'], $categoryKeys);
    }

    public function testCreate()
    {
        $genre = Genre::create([
            'name' => 'Genre'
        ]);

        $genre->refresh();
        $isValidUuid = Str::isUuid($genre->id);

        $this->assertTrue($isValidUuid);
        $this->assertEquals('Genre', $genre->name);
        $this->assertTrue($genre->is_active);

        $genre = Genre::create([
            'name' => 'Genre',
            'is_active' => false
        ]);

        $this->assertFalse($genre->is_active);
    }

    public function testUpdate()
    {
        $genre = factory(Genre::class)->create([
            'is_active' => false,
        ]);

        $data = [
            'name' => 'test name',
            'is_active' => true,
        ];

        $genre->update($data);

        foreach($data as $key => $value) {
            $this->assertEquals($value, $genre->{$key});
        }
    }

    public function testDelete()
    {
        $genre = factory(Genre::class)->create();

        $genre->delete();
        $this->assertNull(Genre::find($genre->id));

        $genre->restore();
        $this->assertNotNull(Genre::find($genre->id));
    }
}
