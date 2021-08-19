<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::attempt(request(['email', 'password']))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        $accessToken = Auth::user()->createToken('authToken')->plainTextToken;
        return response()->json([
            'access_token' => $accessToken,
        ]);
    }
}
