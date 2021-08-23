<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\UpdateTasksService;
use App\Services\GetCanVoteService;

class UserController extends Controller
{
    private $UpdateTasksService;
    private $GetCanVoteService;
    public function __construct(UpdateTasksService $updateTasksService, GetCanVoteService $getCanVoteService)
    {
        $this->UpdateTasksService = $updateTasksService;
        $this->GetCanVoteService = $getCanVoteService;
    }

    public function tasks_validates(Request $request)
    {
        $request->validate([
            'remotatsus_state.*.remotatsu_id' => 'required|integer|exists:remotatsus,id',
            'remotatsus_state.*.remotatsus_state' => 'required|integer',
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
}
