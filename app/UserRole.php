<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserRole extends Model
{
    protected $table = 'user_roles';

    public function user_role()
    {
        return $this->belongsTo(User::class);
    }
}
