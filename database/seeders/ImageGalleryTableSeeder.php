<?php

namespace Database\Seeders;

use App\Models\ImageGallery;
use Illuminate\Database\Seeder;

class ImageGalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImageGallery::factory(50)->create();
    }
}
