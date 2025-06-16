<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\NoticeCategory;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use App\Http\Requests\Notice\StoreNoticeRequest;
use Illuminate\Support\Str;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $showDeleted = $request->has('show_deleted');

        $notices = $showDeleted
            ? Notice::withTrashed()->paginate(15)
            : Notice::paginate(15);

        return view('backend.notice.index', compact('notices', 'showDeleted'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = NoticeCategory::all();
        return view('backend.notice.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoticeRequest $request)
    {
        $validated = $request->validated();

        $filename = Str::slug($validated['title_en']) . '-' . time() . '.' . $request->file('file_path')->getClientOriginalExtension();

        $validated['file_path'] = $request->file('file_path')->storeAs('notices', $filename, 'public');
        $validated['published_date'] = $validated['published_date'] ?? now();

        Notice::create($validated);

        return redirect()->route('notices.index')->with('success', 'Notice created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $notice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        //
    }
}
