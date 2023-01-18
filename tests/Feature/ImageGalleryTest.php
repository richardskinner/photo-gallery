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
        $response = $this->delete('/image-gallery/1');

        $response->assertOk();
    }

    public function test_remove_image_throws_http_when_no_image_exists()
    {
        $response = $this->delete('/image-gallery/TEST');

        $response->assertNotFound();
    }
}
