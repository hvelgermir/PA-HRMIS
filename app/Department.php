<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Department extends Model
{
    protected $table = 'departments';

    public $timestamps = false;

    protected $fillable = ['department_name'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
