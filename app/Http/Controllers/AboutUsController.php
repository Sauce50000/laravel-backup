<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    
    public function index()
    {
        $aboutUs = AboutUs::paginate(10);
        return view('backend.about-us.index', compact('aboutUs'));
    }

    public function create()
    {
        return view('backend.about-us.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'description_en' => 'nullable|string',
        ]);

        AboutUs::create($request->all());

        return redirect()->route('about-us.index')->with('success', 'About Us created successfully.');
    }

    public function edit(AboutUs $about_us)
    {
        return view('backend.about-us.create', ['aboutUs' => $about_us, 'edit' => true]);
    }

    public function update(Request $request, AboutUs $about_us)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'description_en' => 'nullable|string',
        ]);

        $about_us->update($request->all());

        return redirect()->route('about-us.index')->with('success', 'About Us updated successfully.');
    }

    public function destroy(AboutUs $about_us)
    {
        $about_us->delete();
        return redirect()->route('about-us.index')->with('success', 'About Us deleted.');
    }
}
