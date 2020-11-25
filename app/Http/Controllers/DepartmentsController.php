<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Http\Requests\CreateDepartmentRequest;

class DepartmentsController extends Controller
{
    public function index()
    {
        $departments_list = Department::all();
        return view('administration.departments.index', compact('departments_list'));
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('administration.departments.edit', compact('department'));
    }

    public function create()
    {
        $department = new Department();
        return view('administration.departments.create', compact('department'));
    }

    public function store(CreateDepartmentRequest $request)
    {
        Department::create(
            $request->only(
                'department_name'
            )
        );
        return redirect()->route('departments.index')->with('success', 'Department created sucessfully.');
    }

    public function update(CreateDepartmentRequest $request, Department $department)
    {
        $department->update(
            $request->only(
                'department_name'
            )
        );
        return redirect()->route('departments.index');
    }

    public function destroy($id)
    {
        $department = Department::where('id', $id)->firstOrFail();
        $department->delete();
        return redirect()->back();
    }
}
