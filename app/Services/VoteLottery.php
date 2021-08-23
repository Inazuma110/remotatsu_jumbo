<?php
namespace App\Services;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\GetCanVoteService;
use \Symfony\Component\HttpFoundation\Response;

class VoteLottery
{
    private $GetCanVoteService;
    public function __construct(
        GetCanVoteService $getCanVoteService,
    )
    {
        $this->GetCanVoteService = $getCanVoteService;
    }
    public function vote($vote_number)
    {
        if(!$this->GetCanVoteService->get_can_vote())
        {
            return response()->json([
                'message' => 'You do not meet the application requirements.'
            ], Response::HTTP_METHOD_NOT_ALLOWED);
        }
        echo "success";
        $user_id = Auth::id();
        $user = User::find($user_id);
        $user->vote()->create([
            'vote_number' => $vote_number
        ]);
        return response()->json([
            'message' => 'OK'
        ], Response::HTTP_ACCEPTED);
    }
}
