<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GetWinnerInfoService;

class VoteController extends Controller
{
    private $getWinnerInfoService;
    public function __construct(
        getWinnerInfoService $getWinnerInfoService
    )
    {
        $this->getWinnerInfoService= $getWinnerInfoService;
    }

    public function get_winner_number(Request $request)
    {
        return response()->json([
            'winner_number' =>
            $this->getWinnerInfoService->get_winner_number()
        ]);
    }

    public function get_winner_name(Request $request)
    {
        return response()->json([
            'winner_name' =>
            $this->getWinnerInfoService->get_winner_name()
        ]);
    }
}
