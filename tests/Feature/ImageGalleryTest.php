<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
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

    public function test_remove_image(): void
    {
        $response = $this->delete('/api/image-gallery/1');

        $response->assertStatus(200);
        $response->assertContent('{"message":"ok"}');
        $this->assertDatabaseMissing('image_gallery', ['id' => 1]);
    }
}
