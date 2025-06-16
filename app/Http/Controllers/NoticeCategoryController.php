<?php

namespace App\Http\Controllers;

use App\Models\NoticeCategory;
use App\Http\Requests\NoticeCategory\StoreNoticeCategoryRequest;
use App\Http\Requests\NoticeCategory\UpdateNoticeCategoryRequest;
use Illuminate\Http\Request;

class NoticeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $showDeleted = $request->has('show_deleted');

        $noticeCategories = $showDeleted
            ? NoticeCategory::withTrashed()->paginate(10)
            : NoticeCategory::paginate(10);

        return view('backend.noticeCategory.index', compact('noticeCategories','showDeleted'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.noticeCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoticeCategoryRequest $request)
    {
        NoticeCategory::create($request->validated());
        return redirect()->route('notice-categories.index')
            ->with('success', 'Notice Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(NoticeCategory $noticeCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NoticeCategory $noticeCategory)
    {
        return view('backend.noticeCategory.edit', compact('noticeCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticeCategoryRequest $request, NoticeCategory $noticeCategory)
    {
        $noticeCategory->update($request->validated());

        return redirect()->route('notice-categories.index')
            ->with('success', 'Notice Category updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NoticeCategory $noticeCategory)
    {
        $noticeCategory->delete();

        return redirect()->route('notice-categories.index')
            ->with('success', 'Category deleted successfully.');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $category = NoticeCategory::withTrashed()->findOrFail($id);
        $category->restore();

        return redirect()->route('notice-categories.index', ['show_deleted' => true])
            ->with('success', 'Category restored successfully');
    }
}
