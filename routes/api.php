<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\ApiController;
Route::post('/login', [ApiController::class, 'login']);

Route::post('/users', [ApiController::class, 'createUser']);
Route::get('/users', [ApiController::class, 'getAllUsers']);

Route::put('users/{id}', [ApiController::class, 'updateUser']);

Route::delete('users/{id}', [ApiController::class, 'deleteUser']);


