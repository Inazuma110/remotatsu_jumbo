<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model
{
    use HasFactory;
    public function remotatsus()
    {
        return $this->hasMany(Remotatsu::class);
    }
}
