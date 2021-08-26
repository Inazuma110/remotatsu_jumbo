<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Remotatsu;
use Illuminate\Http\Request;

class RemotatsuController extends Controller
{
    public function index()
    {
        return $this->jsonResponse(Remotatsu::all());
    }

}
