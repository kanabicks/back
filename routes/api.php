<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::any('/auth', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required'
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        return 'error';
    }
 
    return $user->createToken($request->device_name)->plainTextToken;
});

Route::get('/get_all', [TaskController::class, 'get_all']);
Route::get('/team/{id}', [TaskController::class, 'get_team']);
Route::get('/delete_team/{id}', [TaskController::class, 'delete_team']);
Route::get('/delete_member/{id1}/{id2}', [TaskController::class, 'delete_member']);
Route::post('/add_team', [TaskController::class, 'add_team']);
Route::post('/add_user/$id', [TaskController::class, 'add_member']);


Route::any("add",[TaskController::class, 'add']);
Route::any('/create', 'App\Http\Controllers\TaskController@create');

//Route::middleware('auth:sanctum')->get('/get_all', 'App\Http\Controllers\TaskController@getAll');
//Route::middleware('auth:sanctum')->get('/change_status', 'App\Http\Controllers\TaskController@changeStatus');
//Route::middleware('auth:sanctum')->any('/create', 'App\Http\Controllers\TaskController@create')->name('create');