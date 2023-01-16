<?php

namespace Tests\Unit;

use App\Http\Services\ImageGalleryService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ImageGalleryServiceTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        // @TODO: remove this and use only the required seeds for each test -
        // this can sometimes cause strange issues when testing data you don't need
        $this->seed();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testThatCorrectItemsPaginationReturned()
    {
        $paginationItems = 20;
        $service = new ImageGalleryService();
        $images = $service->getPaginatedImages($paginationItems);

        $this->assertInstanceOf(LengthAwarePaginator::class, $images);
        $this->assertCount($paginationItems, $images);
    }

    /**
     * @dataProvider getTag
     */
    public function testResultsByTag(?int $tag): void
    {
        $expectedCount = 20;

        if (!empty($tag)) {
            $imageTag = DB::table('image_tag')->where('tag_id', 1)->get();
            $expectedCount = $imageTag->count();
        }

        $service = new ImageGalleryService();
        $images = $service->getPaginatedImages(20, $tag);

        $this->assertCount($expectedCount, $images);
    }

    public function getTag()
    {
        return [
            [1],
            [null]
        ];
    }
}
