<?php

namespace Tests\Unit;

use App\Http\Services\ImageGalleryService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class ImageGalleryServiceTest extends TestCase
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
    public function test_that_correct_items_pagination_returned()
    {
        $paginationItems = 20;
        $service = new ImageGalleryService();
        $images = $service->getPaginatedImages($paginationItems);

        $this->assertInstanceOf(LengthAwarePaginator::class, $images);
        $this->assertCount($paginationItems, $images);
    }
}
