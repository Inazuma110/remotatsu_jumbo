<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GetWinnerInfoService;

class VoteController extends Controller
{
    private $GetWinnerInfoService;
    public function __construct(
        GetWinnerInfoService $getWinnerInfoService
    )
    {
        $this->GetWinnerInfoService= $getWinnerInfoService;
    }

    public function get_winner_number(Request $request)
    {
        return $this->GetWinnerInfoService->get_winner_number();
    }

    public function get_winner(Request $request)
    {
        return $this->GetWinnerInfoService->get_winner();
    }
}
