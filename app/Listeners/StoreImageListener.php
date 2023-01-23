<?php

namespace App\Listeners;

use App\Events\StoreImageEvent;
use App\Http\Services\ImageGalleryService;
use App\Jobs\ImageUploadNotificationEmail;
use Illuminate\Support\Facades\Auth;

class StoreImageListener
{
    private ImageGalleryService $imageGalleryService;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(ImageGalleryService $imageGalleryService)
    {
        $this->imageGalleryService = $imageGalleryService;
    }

    /**
     * Handle the event.
     *
     * @param StoreImageEvent $event
     * @return void
     */
    public function handle(StoreImageEvent $event)
    {
        $this->imageGalleryService->createImageFromUpload($event->title, $event->uploadedFile);
        ImageUploadNotificationEmail::dispatch(Auth::user());
    }
}
