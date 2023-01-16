<?php

namespace App\Http\Services;

use App\Models\ImageGallery;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;

class ImageGalleryService
{
    public function getPaginatedImages(int $totalItems = 10): LengthAwarePaginator
    {
        return ImageGallery::paginate($totalItems);
    }

    public function storeUploadedImage(string $title, UploadedFile $uploadedFile): bool
    {
        $input['image'] = time() . '.' . $uploadedFile->getClientOriginalExtension();
        $uploadedFile->move(public_path('images'), $input['image']);

        $input['title'] = $title;
        ImageGallery::create($input);

        return true;
    }
}