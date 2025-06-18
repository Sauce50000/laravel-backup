<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotoGallery $photoGallery, Photo $photo)
    {
        // Optional: Verify the photo belongs to the gallery
        if ($photo->photo_gallery_id !== $photoGallery->id) {
            abort(403, 'This photo does not belong to the specified gallery.');
        }

        $photo->delete();
        return redirect()->back()->with('success', 'Photo deleted successfully');
    }
}
