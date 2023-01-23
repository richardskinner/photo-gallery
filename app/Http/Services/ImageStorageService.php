<?php

namespace App\Http\Services;

use Carbon\Carbon;
use http\Exception\RuntimeException;
use Illuminate\Http\UploadedFile;

class ImageStorageService
{
    private const FILE_STORAGE_DIR = 'public';
    private const DISK = 'local';

    public function storeImage(UploadedFile $uploadedFile): string
    {
        $date = Carbon::now();
        $imageName = $date->unix() . '.' . $uploadedFile->getClientOriginalExtension();
        $storedImagePath = $uploadedFile->storeAs(self::FILE_STORAGE_DIR, $imageName, ['disk' => self::DISK]);

        if ($storedImagePath === false) {
            throw new RuntimeException('Image not stored');
        }

        return $storedImagePath;
    }
}