<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $showDeleted = $request->has('show_deleted');
        $posts = $showDeleted
            ? Post::withTrashed()->paginate(10)
            : Post::paginate(10);
        return view('backend.position.index', compact('posts', 'showDeleted'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.position.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'required|string|max:255|unique:posts,title_en',
            // 'is_unique' => 'nullable|in:on',
        ]);

        //$boolean = $request->has('is_unique') ? 1 : 0;
        //dd($boolean);
        try {
            Post::create([
                'title' => $request->title,
                'title_en' => $request->title_en,
                'is_unique' => $request->has('is_unique') ? 1 : 0,
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $edit = true;
        return view('backend.position.create', compact('post', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'required|string|max:255|unique:posts,title_en,' . $post->id,
        
        ]);

        try {
            $post->update([
                'title' => $request->title,
                'title_en' => $request->title_en,
                'is_unique' => $request->has('is_unique') ? 1 : 0,
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();
        } catch (\Exception $e) {
            return redirect()->route('posts.index')->with('error', 'Failed to delete post: ' . $e->getMessage());
        }
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
