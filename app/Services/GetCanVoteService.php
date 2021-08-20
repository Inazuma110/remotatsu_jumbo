<?php
namespace App\Services;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GetCanVoteService
{
    public function get_can_vote()
    {
        $minimum_achievements_number = 15;
        $user_id = Auth::id();
        $user = User::find($user_id);
        $remotatsus = $user->remotatsus;
        return count($remotatsus) >= $minimum_achievements_number;
    }
}
