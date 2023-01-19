<?php

namespace App\Http\Controllers;

use App\Events\DeleteImageEvent;
use App\Events\StoreImageEvent;
use App\Http\Requests\UploadRequest;
use App\Http\Services\ImageGalleryService;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Routing\Annotation\Route;

class ImageGalleryController extends Controller
{
    public function __construct(private ImageGalleryService $imageGalleryService)
    {
    }

    #[Route("/image-gallery", methods: ["GET"])]
    public function index(Request $request)
    {
        $tagId = $request->get('tag');
        $images = $this->imageGalleryService->getPaginatedImages(20, $tagId);
        $tags = Tag::all();

        return view('image-gallery', compact('images', 'tags'));
    }


    #[Route("/image-gallery", methods: ["POST"])]
    public function upload(UploadRequest $request)
    {
        event(new StoreImageEvent($request->title, $request->image));

        return back()->with('success', 'Image Uploaded successfully.');
    }

    #[Route("/image-gallery/{id}", methods: ["DELETE"])]
    public function destroy(Image $image)
    {
        try {
            event(new DeleteImageEvent($image));
            return back()->with('success', 'Image Deleted successfully.');
        } catch (ModelNotFoundException $exception) {
            Log::error('No image exists', ['exceptionMessage' => $exception->getMessage()]);
            return back()->with('error', 'Image does not exist.');
        }
    }
}