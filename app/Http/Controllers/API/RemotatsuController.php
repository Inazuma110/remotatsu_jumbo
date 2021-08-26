<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Remotatsu;
use Illuminate\Http\Request;
use App\Services\RemotatsusService;

class RemotatsuController extends Controller
{
    private $remotatsusService;
    public function __construct(
        RemotatsusService $remotatsusService
    )
    {
        $this->remotatsusService = $remotatsusService;
    }

    public function index(Request $request)
    {
        return $this->jsonResponse(
            $this->remotatsusService->index()
        );
    }
}
