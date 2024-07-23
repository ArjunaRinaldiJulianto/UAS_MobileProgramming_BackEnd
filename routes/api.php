<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employees', 'App\Http\Controllers\EmployeeController@index');
Route::post('/employees', 'App\Http\Controllers\EmployeeController@store');
Route::put('/employees/{employee}', 'App\Http\Controllers\EmployeeController@update');
Route::delete('/employees/{employee}', 'App\Http\Controllers\EmployeeController@destroy');
Route::get('/employees/{employee}', 'App\Http\Controllers\EmployeeController@show');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    // Route::apiResource('/employees', EmployeeController::class);
});
