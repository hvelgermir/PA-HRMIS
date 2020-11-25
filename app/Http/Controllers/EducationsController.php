<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddNewEducationRequest;
use App\Education;
use App\Employee;

class EducationsController extends Controller
{
    
    public function create(Employee $employee)
    {
        $education = new Education();
        return view('employees.education.create', compact('education', 'employee'));
    }

    public function edit(Education $education)
    {
        $employee = $education->employee;
        return view('employees.education.edit', compact('education', 'employee'));
    }

    public function store(AddNewEducationRequest $request, Employee $employee)
    {
        $employee->education()->create(
            $request->only(
                'level', 
                'school_name', 
                'date_graduated'
            )
        );
        return redirect()->route('employees.show', $employee->id);
    }

    public function destroy($id)
    {
        $education = Education::where('id',$id)->firstOrFail();
        $education->delete();
        return redirect()->back();
    }

    public function update(AddNewEducationRequest $request, Education $education)
    {
        $education->update(
            $request->only(
                'level', 
                'school_name', 
                'date_graduated'
            )
        );
        $employee = $education->employee;
        return redirect()->route('employees.show', $employee->id);
    }
}
