<?php

namespace App\Http\Services;

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;

class ImageStorageService
{
    private const FULL_STORAGE_PATH = 'app/public';
    private const FILE_STORAGE_DIR = 'public';
    private const DISK = 'local';

    public function storeImage(UploadedFile $uploadedFile): string
    {
        $date = Carbon::now();
        $imageName = $date->unix() . '.' . $uploadedFile->getClientOriginalExtension();
        $imagePath =  storage_path(self::FULL_STORAGE_PATH) . $imageName;
        $uploadedFile->storeAs(self::FILE_STORAGE_DIR, $imageName, ['disk' => self::DISK]);

        return $imagePath;
    }
}