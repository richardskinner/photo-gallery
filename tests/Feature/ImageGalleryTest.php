<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ImageGalleryTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_get_list_of_gallery_images(): void
    {
        $response = $this->get('/image-gallery');

        $response->assertStatus(200);
    }

    public function test_stores_image_in_local_storage_correctly()
    {
        Carbon::setTestNow();
        $url = route('index');
        $imagePath = Carbon::now()->unix() .'.jpg';

        Storage::fake('local');

        $response = $this->from($url)
            ->post(
                $url,
                [
                    'title' => 'Avatar',
                    'image' => UploadedFile::fake()->image($imagePath)
                ]
            );

        $response->assertStatus(302);
        $response->assertRedirect($url);

        Storage::disk('local')->assertExists('public/' . $imagePath);
    }

    public function test_remove_image(): void
    {
        $response = $this->delete('/api/image-gallery/1');

        $response->assertStatus(200);
        $response->assertContent('{"message":"ok"}');
        $this->assertDatabaseMissing('image_gallery', ['id' => 1]);
    }

    public function tearDown(): void
    {
        parent::tearDown();
        Storage::disk('local')->deleteDirectory('public');
    }
}
