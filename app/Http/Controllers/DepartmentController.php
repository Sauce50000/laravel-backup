<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $showDeleted = $request->has('show_deleted');
        $departments = $showDeleted
            ? Department::withTrashed()->paginate(10)
            : Department::paginate(10);
        return view('backend.department.index', compact('departments', 'showDeleted'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $slug = Str::slug($request->title_en);

        $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description' => 'nullable|string',
            'slug' => 'nullable|string|max:255|unique:departments,slug',
        ]);

        $data = $request->all();
        $data['slug'] = $slug;

        Department::create($data);

        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        $edit = true;
        return view('backend.department.create', compact('department', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {


        ///$slug = Str::slug($request->title_en);

        $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description' => 'nullable|string',
            'slug' => 'nullable|string|max:255|unique:departments,slug',
        ]);

        //$data = $request->all();
        //$data['slug'] = $slug;

        Department::create($request->all());

        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $department = Department::onlyTrashed()->findOrFail($id);
        $department->restore();

        return redirect()->route('departments.index')->with('success', 'Department restored successfully.');
    }
}
