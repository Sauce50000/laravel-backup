<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Post;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Branch;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $showDeleted = $request->has('show_deleted');
        if ($showDeleted) {
            $employees = Employee::with(['post', 'department'])->onlyTrashed()->paginate(10);
            return view('backend.employee.index', compact('employees', 'showDeleted'));
        } else {
            $employees = Employee::with(['post', 'department'])->paginate(10);
            return view('backend.employee.index', compact('employees', 'showDeleted'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::all();
        $departments = Department::all();
        $branches = Branch::all();
        return view('backend.employee.create', compact('posts', 'departments','branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        //dd($request->all());

        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('employees', 'public');
        }

        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        // if ($request->hasFile('image_path')) {
        //     $employee->image_path = $request->file('image_path')->store('employees', 'public');
        // }

        // $employee->save();
        Employee::create($data);
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //dd($employee);
        $edit = true;
        $posts = Post::all();
        $departments = Department::all();
        $branches = Branch::all();
        return view('backend.employee.create', compact('employee', 'posts', 'departments', 'branches','edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($employee->image_path) {
                Storage::disk('public')->delete($employee->image_path);
            }
            $data['image_path'] = $request->file('image')->store('employees', 'public');
        }

        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        // Update the employee
        $employee->update($data);
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->is_active = 0; // Set is_active to false
        $employee->save();
        // Soft delete the employee
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
