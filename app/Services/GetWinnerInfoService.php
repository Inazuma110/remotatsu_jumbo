<?php
namespace App\Services;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Vote;

class GetWinnerInfoService
{
    public function get_winner_number()
    {
        $voted_numbers = Vote::select('vote_number')
            ->get()->pluck('vote_number')->all();
        $winner_number = PHP_INT_MAX;
        $counts = array_count_values($voted_numbers);
        foreach($counts as $number => $count)
        {
            if($count >= 2) continue;
            if($winner_number > $number) continue;
            $winner_number = $number;
        }
        return $number;
    }

    public function get_winner()
    {
    }
}
