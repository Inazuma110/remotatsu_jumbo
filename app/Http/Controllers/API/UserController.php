<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\UpdateTasksService;
use App\Services\GetCanVoteService;
use App\Services\VoteLottery;
use \Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    private $UpdateTasksService;
    private $GetCanVoteService;
    private $VoteLottery;
    public function __construct(
        UpdateTasksService $updateTasksService,
        GetCanVoteService $getCanVoteService,
        VoteLottery $voteLottery
    )
    {
        $this->UpdateTasksService = $updateTasksService;
        $this->GetCanVoteService = $getCanVoteService;
        $this->VoteLottery = $voteLottery;
    }

    public function tasks_validates(Request $request)
    {
        $request->validate([
            'remotatsus_state.*.remotatsu_id' => 'required|integer|exists:remotatsus,id',
            'remotatsus_state.*.remotatsus_state' => 'required|integer',
        ]);

    }

    public function vote_validate(Request $request)
    {
        $request->validate([
            'number' => 'required|integer|gte:1'
        ]);
    }

    public function update_tasks(Request $request)
    {
        DB::beginTransaction();
        try
        {
            $this->tasks_validates($request);
            $tasks = $this->UpdateTasksService->update_tasks($request->remotatsus_state);
            DB::commit();
            return $tasks;
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            throw $e;
        }
    }

    public function get_can_vote(Request $request)
    {
        return $this->GetCanVoteService->get_can_vote();
    }

    public function vote(Request $request){
        DB::beginTransaction();
        try
        {
            $this->vote_validate($request);
            if(!$this->GetCanVoteService->get_can_vote())
            {
                return response()->json([
                    'message' => 'You do not meet the application requirements.'
                ], Response::HTTP_METHOD_NOT_ALLOWED);
            }
            $this->VoteLottery->vote($request->number);
            DB::commit();
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            throw $e;
        }


    }
}
