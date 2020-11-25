<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Education extends Model
{
    protected $table = 'employees_education';
    public $timestamps = false;
    protected $fillable = ['employee_id', 'level', 'school_name', 'date_graduated'];

    public function employee()
    {
        return  $this->belongsTo(Employee::class);
    }
}
