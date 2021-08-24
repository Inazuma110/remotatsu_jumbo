<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remotatsu extends Model
{
    use HasFactory;

    public function users()
    {
        return
            $this->belongsToMany
            (
                User::class, 'remotatsu_tasks'
            );
    }

    public function difficulty()
    {
        return $this->belongsTo(Difficulty::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
