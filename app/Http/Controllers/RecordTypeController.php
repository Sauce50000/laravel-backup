<?php

namespace App\Http\Controllers;

use App\Models\RecordType;
use Illuminate\Http\Request;
use App\Http\Requests\RecordType\StoreRecordTypeRequest;
use App\Http\Requests\RecordType\UpdateRecordTypeRequest;

class RecordTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $showDeleted = $request->has('show_deleted');
        $recordTypes = $showDeleted
            ? RecordType::withTrashed()->paginate(10)
            : RecordType::paginate(10);

        return view('backend.recordType.index', compact('recordTypes', 'showDeleted'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.recordType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecordTypeRequest $request)
    {
        // dd($request->validated());
        RecordType::create($request->validated());

        return redirect()->route('record-types.index')
            ->with('success', 'Record Type created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(RecordType $recordType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecordType $recordType)
    {
        return view('backend.recordType.edit', compact('recordType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecordTypeRequest $request, RecordType $recordType)
    {
        $recordType->update($request->validated());

        return redirect()->route('record-types.index')
            ->with('success', 'Record Type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecordType $recordType)
    {
        $recordType->delete();

        return redirect()->route('record-types.index')
            ->with('success', 'Record Type deleted successfully.');
    }

    public function restore($id)
    {
        $recordType = RecordType::withTrashed()->findOrFail($id);
        $recordType->restore();

        return redirect()->route('record-types.index', ['show_deleted' => true])
            ->with('success', 'Record Type restored successfully');
    }
}
