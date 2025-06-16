<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\NoticeCategory;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use App\Http\Requests\Notice\StoreNoticeRequest;
use App\Http\Requests\Notice\UpdateNoticeRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $showDeleted = $request->has('show_deleted');

        $notices = $showDeleted
            ? Notice::latest()->withTrashed()->paginate(10)
            : Notice::latest()->paginate(10);

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
        $categories = NoticeCategory::all();
        return view('backend.notice.edit', compact('notice', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
        $validated = $request->validated();

        if ($request->hasFile('file_path')) {
            // Handle file upload
            $filename = Str::slug($validated['title_en']) . '-' . time() . '.' . $request->file('file_path')->getClientOriginalExtension();
            $validated['file_path'] = $request->file('file_path')->storeAs('notices', $filename, 'public');
        }

        $notice->update($validated);

        return redirect()->route('notices.index')->with('success', 'Notice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        $notice->delete(); // soft delete
        return redirect()->route('notices.index')->with('success', 'Notice moved to trash.');
    }

    public function restore($id)
    {
        $notice = Notice::onlyTrashed()->findOrFail($id);
        $notice->restore();

        return redirect()->route('notices.index')->with('success', 'Notice restored successfully.');
    }

    public function forceDelete($id)
    {
        $notice = Notice::onlyTrashed()->findOrFail($id);

        // Delete file from storage
        if ($notice->file_path && Storage::disk('public')->exists($notice->file_path)) {
            Storage::disk('public')->delete($notice->file_path);
        }

        $notice->forceDelete(); // permanently delete

        return redirect()->route('notices.index')->with('success', 'Notice permanently deleted.');
    }
}
