<?php

namespace App\Http\Controllers;

use App\Events\StoreImageEvent;
use App\Http\Requests\UploadRequest;
use App\Http\Services\ImageGalleryService;
use App\Models\ImageGallery;
use Symfony\Component\Routing\Annotation\Route;

class ImageGalleryController extends Controller
{
    private ImageGalleryService $imageGalleryService;

    public function __construct(ImageGalleryService $imageGalleryService)
    {
        $this->imageGalleryService = $imageGalleryService;
    }

    #[Route("/image-gallery", methods: ["GET"])]
    public function index()
    {
        $images = $this->imageGalleryService->getPaginatedImages(20);

        return view('image-gallery', compact('images'));
    }


    #[Route("/image-gallery", methods: ["POST"])]
    public function upload(UploadRequest $request)
    {
        event(new StoreImageEvent($request->title, $request->image));

        return back()->with('success', 'Image Uploaded successfully.');
    }

    #[Route("/image-gallery/{id}", methods: ["DELETE"])]
    public function destroy(int $id)
    {
        ImageGallery::find($id)->delete();

        return response()->json(['message' => 'ok'], 200);
    }
}