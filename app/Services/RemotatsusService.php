<?php
namespace App\Services;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Remotatsu;


class RemotatsusService
{
    public function index()
    {
        // var_dump(Remotatsu::all()->toArray());
        return Remotatsu::all()->sortBy('display_order');
    }
}
