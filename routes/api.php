<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/remotatsus', [RemotatsuController::class, 'index']);
Route::middleware('auth:sanctum')->post('/remotatsus_state', [UserController::class, 'update_tasks']);
Route::middleware('auth:sanctum')->get('/can_vote', [UserController::class, 'get_can_vote']);
Route::middleware('auth:sanctum')->post('/lottery', [UserController::class, 'vote']);
Route::middleware('auth:sanctum')->get('/winner_number', [VoteController::class, 'get_winner_number']);
Route::middleware('auth:sanctum')->get('/winner', [VoteController::class, 'get_winner']);
