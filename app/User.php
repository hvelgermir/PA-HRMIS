<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserRole;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'lname', 'fname', 'mname', 'email', 'password', 'user_role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->hasOne(UserRole::class, 'id', 'user_role');
    }

    public function getFullNameAttribute()
    {
        return $this->fname . " " . $this->mname . " " . $this->lname;
    }

    public function getFullNameSurnameFirstAttribute()
    {
        return $this->lname . ", " . $this->fname . " " . $this->mname;
    }

    public function getCommonNameAttribute()
    {
        return $this->fname . " " . $this->lname;
    }
}
