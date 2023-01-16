<?php

namespace App\Http\Services;

use App\Models\Image;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;

class ImageGalleryService
{
    public function getPaginatedImages(int $totalItems = 10, ?int $tagId = null): LengthAwarePaginator
    {
        return Image::whereHas('tags', function(Builder $query) use($tagId) {
            if (empty($tagId)) {
                return;
            }
            $query->where('tag_id', $tagId);
        })->paginate($totalItems);
    }

    public function storeUploadedImage(string $title, UploadedFile $uploadedFile): bool
    {
        $input['image'] = time() . '.' . $uploadedFile->getClientOriginalExtension();
        $uploadedFile->move(public_path('images'), $input['image']);

        $input['title'] = $title;
        Image::create($input);

        return true;
    }
}