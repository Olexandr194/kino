<?php

namespace Tests\Feature;

use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class MovieTest extends TestCase
{
    public function test_index()
    {
        $this->withoutMiddleware();
        $response = $this->get(route('admin.movies.index'));
        $response->assertOk();
    }

    public function test_create()
    {
        $this->post('/login', [
            'email' => 'olexandrmirochnik@gmail.com',
            'password' => '123456789',
        ]);
        $response = $this->get(route('admin.movies.create'));

        $response->assertOk();
    }

    public function test_store()
    {
        $this->post('/login', [
            'email' => 'olexandrmirochnik@gmail.com',
            'password' => '123456789',
        ]);
        Storage::fake('public');

        $main_image = UploadedFile::fake()->create('main_movie.png');
        $image[] = UploadedFile::fake()->create('movie.png');

        $this->post(route('admin.movies.store'), [
            'title' => 'movie',
            'description' => 'some text',
            'main_image' => $main_image,
            'trailer_url' => 'http://laravel.kino.ua/admin/movies/create',
            'type' => '2D',
            'seo_url' => 'seo',
            'seo_title' => 'seo',
            'seo_keywords' => 'seo',
            'seo_description' => 'seo',
            'image' => $image,
        ]);

        $this->assertDatabaseHas('movies', [
            'title' => 'movie',
            'description' => 'some text',
            'trailer_url' => 'http://laravel.kino.ua/admin/movies/create',
            'type' => '2D',
            'seo_url' => 'seo',
            'seo_title' => 'seo',
            'seo_keywords' => 'seo',
            'seo_description' => 'seo',
        ]);
    }

    public function test_edit()
    {
        $this->post('/login', [
            'email' => 'olexandrmirochnik@gmail.com',
            'password' => '123456789',
        ]);

        $movie = Movie::where('title', 'movie')->first();
        $response = $this->get(route('admin.movies.edit', $movie->id));
        $response->assertOk();
    }

    public function test_update()
    {
        $this->post('/login', [
            'email' => 'olexandrmirochnik@gmail.com',
            'password' => '123456789',
        ]);
        $movie = Movie::where('title', 'movie')->first();
        $this->patch(route('admin.movies.update', $movie->id), [
            'title' => 'new movie',
            'description' => 'another text',
            'trailer_url' => 'http://laravel.kino.ua/admin/movies/create',
            'type' => 'IMAX',
            'seo_url' => 'seo',
            'seo_title' => 'seo',
            'seo_keywords' => 'seo',
            'seo_description' => 'seo',
        ]);

        $this->assertDatabaseHas('movies', [
            'title' => 'new movie',
            'description' => 'another text',
            'trailer_url' => 'http://laravel.kino.ua/admin/movies/create',
            'type' => 'IMAX',
            'seo_url' => 'seo',
            'seo_title' => 'seo',
            'seo_keywords' => 'seo',
            'seo_description' => 'seo',
        ]);
    }

    public function test_delete()
    {
        $this->post('/login', [
            'email' => 'olexandrmirochnik@gmail.com',
            'password' => '123456789',
        ]);

        $movie = Movie::where('title', 'new movie')->first();
        $this->post(route('admin.movies.destroy_movie', $movie->id));
        $movie->delete();
        $this->assertDatabaseMissing('movies', ['title' => 'new movie']);
    }

}
