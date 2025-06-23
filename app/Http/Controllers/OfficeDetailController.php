<?php

namespace App\Http\Controllers;

use App\Models\officeDetail;
use Illuminate\Http\Request;

class OfficeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$showDeleted = $request->has('show_deleted');
        $officeDetails = officeDetail::paginate(10);
        return view('backend.officeDetail.index', compact('officeDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('backend.officeDetail.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description' => 'nullable|string',
            'description_en' => 'nullable|string',
        ]);

        officeDetail::create($request->all());
        return redirect()->route('office-details.index')->with('success', 'Office detail created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(officeDetail $officeDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(officeDetail $officeDetail)
    {
        $edit = true;
        return view('backend.officeDetail.create', compact('officeDetail', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, officeDetail $officeDetail)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description' => 'nullable|string',
            'description_en' => 'nullable|string',
        ]);

        $officeDetail->update($request->all());
        return redirect()->route('office-details.index')->with('success', 'Office detail updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(officeDetail $officeDetail)
    {
        $officeDetail->delete();
        return redirect()->route('office-details.index')->with('success', 'Office detail deleted successfully.');
    }
}
