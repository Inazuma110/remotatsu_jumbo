<?php
namespace App\Services;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GetCanVoteService
{
    private const MINIMUM_ACHIEVEMENTS_NUMBER = 15;
    public function get_can_vote() : bool
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        if(!is_null($user->vote)) return false;
        $remotatsus = $user->remotatsus;
        return count($remotatsus) >= self::MINIMUM_ACHIEVEMENTS_NUMBER;
    }
}
