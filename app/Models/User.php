<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    public function vote(){
        return $this->hasOne(Vote::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function remotatsus(){
        return $this->belongsToMany(Remotatsu::class, 'remotatsu_tasks', 'remotatsu_id', 'user_id');
    }
}
