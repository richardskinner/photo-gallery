<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::factory(50)->create();
        Image::factory(50)->create()->each(function ($image) use ($tags) {
            $image->tags()->attach($tags->random(number: 2));
        });
    }
}
