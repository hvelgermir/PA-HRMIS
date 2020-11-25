<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Department;
use App\Http\Requests\RegisterEmployeeRequest;

class EmployeesController extends Controller
{

    

    public function index()
    {
        $employees_list = Employee::with('department')->get();
        return view('employees.employees.index', compact('employees_list'));
    }

    public function create()
    {
        $employee = new Employee();
        $departments_list = Department::orderBy('department_name', 'ASC')->get();
        $gender_list = ['Male', 'Female'];
        return view('employees.employees.create', compact('employee', 'departments_list', 'gender_list'));
    }

    public function store(RegisterEmployeeRequest $request)
    {
        Employee::create(
            $request->only(
                'lname',
                'fname',
                'gender',
                'mname',
                'dob',
                'department_id'
            )
        );
        return redirect()->route('employees.index');
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        if(is_null($employee))
        {
            return view('errors.404');
        }
        return view('employees.employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $departments_list = Department::orderBy('department_name', 'ASC')->get();
        $gender_list = ['Male', 'Female'];
        return view('employees.employees.edit', compact('employee', 'gender_list', 'departments_list'));
    }

    public function update(RegisterEmployeeRequest $request, Employee $employee)
    {
        $employee->update(
            $request->only(
                'lname',
                'fname',
                'gender',
                'mname',
                'dob',
                'department_id'
            )
        );
        return redirect()->route('employees.show', $employee->id);
    }

    public function destroy($id)
    {
        $employee = Employee::where('id', $id)->firstOrFail();
        $employee->delete();
        return redirect()->back();
    }
}
