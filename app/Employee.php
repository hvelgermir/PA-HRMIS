<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;
use App\Education;

class Employee extends Model
{
    
    protected $table = 'employees';
    public $timestamps = false;
    protected $fillable = ['lname', 'fname', 'mname', 'gender','dob', 'department_id'];


    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function getFullNameAttribute()
    {
        return $this->fname . " " . $this->mname . " " . $this->lname;
    }

    public function getFullNameSurnameFirstAttribute()
    {
        return $this->lname . ", " . $this->fname . " " . $this->mname;
    }
}
