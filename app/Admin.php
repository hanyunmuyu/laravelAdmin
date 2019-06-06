<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    public function getAvatarAttribute($avatar)
    {
        return asset('storage/' . $avatar);
    }

    public function role()
    {
        return $this->belongsTo('\App\Models\Role')->first();
    }

    public function permission()
    {
        return $this->role()->permission();
    }
}
