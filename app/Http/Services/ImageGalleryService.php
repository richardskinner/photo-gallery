<?php

namespace App\Http\Services;

use App\Models\Image;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;

class ImageGalleryService
{
    public function __construct(private ImageStorageService $imageStorageService)
    {}

    public function getPaginatedImages(int $totalItems = 10, ?int $tagId = null): LengthAwarePaginator
    {
        return Image::whereHas('tags', function(Builder $query) use($tagId) {
            if (empty($tagId)) {
                return;
            }
            $query->where('tag_id', $tagId);
        })->paginate($totalItems);
    }

    public function createImageFromUpload(string $title, UploadedFile $uploadedFile): bool
    {
        $image = $this->imageStorageService->storeImage($uploadedFile);
        Image::create(['title' => $title, 'image' => $image]);

        return true;
    }
}