<?php
namespace App\Services;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VoteLottery
{
    public function vote($vote_number)
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $user->vote()->create([
            'vote_number' => $vote_number
        ]);
    }
}
