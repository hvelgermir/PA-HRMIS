<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\Employee;
use DB;
use App\Charts\SampleChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        $user_count = User::count();
        $department_count = Department::count();
        $employee_count = Employee::count();
        //Query
        $employee = DB::table('employees')
            ->select('departments.department_name', DB::raw('COUNT(employees.id) AS emp_count'))
            ->join('departments', 'employees.department_id', '=', 'departments.id')
            ->groupBy('departments.department_name')
            ->orderBy('departments.department_name', 'ASC')
            ->get();
        // Charting
        $result = $employee->pluck('emp_count', 'department_name');
        $chart = new SampleChart();
        $chart->labels($result->keys());
        $chart->dataset('Employees', 'bar', $result->values())
            ->backgroundColor('rgba(0,100,255, .4)');

        //JS Only
        $keys = $result->keys();
        $values = $result->values();
        return view('home', compact('user_count', 'department_count', 'employee_count', 'employee', 'chart', 'keys', 'values'));
    }
}
