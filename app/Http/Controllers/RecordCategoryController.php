<?php

namespace App\Http\Controllers;

use App\Http\Requests\Notice\UpdateNoticeRequest;
use App\Models\RecordCategory;
use App\Models\RecordType;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use App\Http\Requests\RecordCategory\StoreRecordCategoryRequest;
use App\Http\Requests\RecordCategory\UpdateRecordCategoryRequest;

class RecordCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $showDeleted = $request->has('show_deleted');

        $recordCategories = $showDeleted
            ? RecordCategory::withTrashed()->paginate(10)
            : RecordCategory::paginate(10);

        return view('backend.recordCategory.index', compact('recordCategories', 'showDeleted'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $recordTypes = RecordType::all();
        return view('backend.recordCategory.create', compact('recordTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecordCategoryRequest $request)
    {
        RecordCategory::create($request->validated());

        return redirect()->route('record-categories.index')
            ->with('success', 'Record Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RecordCategory $recordCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecordCategory $recordCategory)
    {
        $recordTypes = RecordType::all();
        return view('backend.recordCategory.edit', compact('recordTypes', 'recordCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecordCategoryRequest $request, RecordCategory $recordCategory)
    {
        $recordCategory->update($request->validated());

        return redirect()->route('record-categories.index')
            ->with('success', 'Record Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecordCategory $recordCategory)
    {

        $recordCategory->delete();

        return redirect()->route('record-categories.index')
            ->with('success', 'Record Category deleted successfully.');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $recordCategory = RecordCategory::withTrashed()->findOrFail($id);
        $recordCategory->restore();
        return redirect()->route('record-categories.index')
            ->with('success', 'Record Category restored successfully.');
    }
}
