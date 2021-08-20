<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Log;

class UserController extends Controller
{
    public function update_tasks(Request $request)
    {
        $user_id = Auth::id();
        DB::beginTransaction();
        try
        {
            $remotatsu_tasks = DB::table('remotatsu_tasks');
            $remotatsu_tasks->where('user_id', $user_id)->delete();
            $remotatsus_state = $request->remotatsus_state;

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
            DB::commit();
            return $tasks;
        }catch(\Exception $e){
            DB::rollBack();
            throw $e;
        }
    }
}
