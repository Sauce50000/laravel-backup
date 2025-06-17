<?php

namespace App\Http\Controllers;

use App\Http\Requests\Record\StoreRecordRequest;
use App\Http\Requests\Record\UpdateRecordRequest;
use App\Models\Record;
use App\Models\RecordCategory;
use App\Models\RecordType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $showDeleted = $request->has('show_deleted');

        $records = $showDeleted
            ? Record::with(['type', 'category'])->withTrashed()->latest()->paginate(10)
            : Record::with(['type', 'category'])->latest()->paginate(10);

        $categories = RecordCategory::all();
        $types = RecordType::with('categories')->get();

        return view('backend.record.index', compact('records', 'showDeleted', 'types', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $categories = RecordCategory::all();
        // $types = RecordType::all();
        // return view('backend.record.create', compact('categories', 'types'));
        $types = RecordType::with('categories')->get();
        return view('backend.record.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecordRequest $request)
    {
        $validated = $request->validated();
        $filename = Str::slug($validated['title_en']) . '-' . time() . '.' . $request->file('file_path')->getClientOriginalExtension();

        $validated['file_path'] = $request->file('file_path')->storeAs('records', $filename, 'public');
        $validated['published_date'] = $validated['published_date'] ?? now();

        // Create the record
        Record::create($validated);
        return redirect()->route('records.index')->with('success', 'Record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        // $types = RecordType::with('categories')->get();
        // return view('backend.record.edit', compact('record', 'types'));

        // $record = Record::findOrFail($id);
        $types = RecordType::all();
        $categories = RecordCategory::all();

        return view('backend.record.edit', compact('record', 'types', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecordRequest $request, Record $record)
    {
        $validated = $request->validated();

        if ($request->hasFile('file_path')) {
            // Handle file upload
            $filename = Str::slug($validated['title_en']) . '-' . time() . '.' . $request->file('file_path')->getClientOriginalExtension();
            $validated['file_path'] = $request->file('file_path')->storeAs('records', $filename, 'public');
        }

        $record->update($validated);

        return redirect()->route('records.index')->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        $record->delete();
        return redirect()->route('records.index')->with('success', 'Record deleted successfully.');
    }

    public function restore($id)
    {
        $record = Record::onlyTrashed()->findOrFail($id);
        $record->restore();

        return redirect()->route('records.index')->with('success', 'Record restored successfully.');
    }

    public function forceDelete($id)
    {
        $record = Record::onlyTrashed()->findOrFail($id);
        $record->forceDelete();
        return redirect()->route('records.index')->with('success', 'Record permanently deleted.');
    }

}
