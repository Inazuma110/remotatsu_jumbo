<?php
namespace App\Services;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\RemotatsuTask;

class UpdateTasksService
{
    public function update_tasks($remotatsus_state)
    {
        $user_id = Auth::id();
        RemotatsuTask::where('user_id', $user_id)->delete();

        foreach($remotatsus_state as $state)
        {
            if($state["remotatsus_state"] === 0) continue;
            RemotatsuTask::create([
                'user_id' => $user_id,
                'remotatsu_id' => $state["remotatsu_id"]
            ]);
        }
        $user = User::find($user_id);
        $tasks = $user->remotatsus;
        return $tasks;
    }
}
