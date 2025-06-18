<?php

namespace App\Http\Controllers;

use App\Models\PhotoGallery;
use App\Models\Photo;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use App\Http\Requests\PhotoGallery\StorePhotoGalleryRequest;
use App\Http\Requests\PhotoGallery\UpdatePhotoGalleryRequest;
use Illuminate\Support\Facades\Storage;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $showDeleted = $request->input('show_deleted', false);
        // $photoGalleries = $showDeleted
        //     ? PhotoGallery::withTrashed()->get()
        //     : PhotoGallery::all();
        $photoGalleries = $showDeleted
            ? PhotoGallery::withTrashed()->with('latestPhoto')->withCount('photos')->paginate(12)
            : PhotoGallery::with('latestPhoto')->withCount('photos')->paginate(12);
        return view('backend.photoGallery.index', compact('photoGalleries', 'showDeleted'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.photoGallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotoGalleryRequest $request)
    {
        $validatedData = $request->validated();
        $gallery = PhotoGallery::create($validatedData);

        // Save images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('photos', 'public');
                Photo::create([
                    'photo_gallery_id' => $gallery->id,
                    'title' => $gallery->album_title . ' ' . ($loopIndex ?? ''), // or some other logic
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('photos-galleries.index')->with('success', 'Photo gallery created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PhotoGallery $photoGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhotoGallery $photos_gallery)
    {
        // Load the photos for the gallery
        // $photos = $photoGallery->photos;
        // dd($photos);
        // return view('backend.photoGallery.edit', compact('photoGallery', 'photos'));

        // Eager load the photos with the gallery
        $photos_gallery->load('photos');
        // dd($photos_gallery->album_title);
        return view('backend.photoGallery.edit', compact('photos_gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePhotoGalleryRequest $request, PhotoGallery $photos_gallery)
    {
        $validatedData = $request->validated();
        $photos_gallery->update([
            'album_title' => $validatedData['album_title'],
            'album_title_en' => $validatedData['album_title_en'],
        ]);

        if ($request->hasFile('images')) {
            $loopIndex = $photos_gallery->photos()->count() + 1;
            foreach ($request->file('images') as $image) {
                $path = $image->store('photos', 'public');
                $photos_gallery->photos()->create([
                    'title' => $photos_gallery->album_title . ' ' . $loopIndex,
                    'image_path' => $path,
                ]);
                $loopIndex++;
            }
        }

        return redirect()->route('photos-galleries.index')->with('success', 'Gallery updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotoGallery $photos_gallery, Photo $photo)
    {


        // Ensure the photo belongs to the given gallery
        if ($photo->photo_gallery_id !== $photos_gallery->id) {
            abort(403, 'Unauthorized action.');
        }

        // Delete the file from storage
        $publicDisk = Storage::disk('public');
        if ($photo->image_path && $publicDisk->exists($photo->image_path)) {
            $publicDisk->delete($photo->image_path);
        }

        // Delete the photo from the database
        $photo->delete();

        return redirect()->back()->with('success', 'Photo deleted successfully.');
    }
}
