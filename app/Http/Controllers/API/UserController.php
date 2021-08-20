<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\UpdateTasksService;

class UserController extends Controller
{
    private $UpdateTasksService;
    public function __construct(UpdateTasksService $updateTasksService)
    {
        $this->UpdateTasksService = $updateTasksService;
    }

    public function update_tasks(Request $request)
    {
        DB::beginTransaction();
        try
        {
            // TODO: requestをそのまま渡さない
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
}
