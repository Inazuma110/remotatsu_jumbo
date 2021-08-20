<?php
namespace App\Services;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UpdateTasksService
{
    public function update_tasks($remotatsus_state)
    {
        $user_id = Auth::id();
        $remotatsu_tasks = DB::table('remotatsu_tasks');
        $remotatsu_tasks->where('user_id', $user_id)->delete();

        foreach($remotatsus_state as $state)
        {
            if($state["remotatsus_state"] === 0) continue;
            $remotatsu_tasks->insert([
                'user_id' => $user_id,
                'remotatsu_id' => $state["remotatsu_id"]
            ]);
        }
        $user = User::find($user_id);
        $tasks = $user->remotatsus;
        return $tasks;
    }
}
