<?php
use App\Http\Controllers\ControlController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('showhello', [ControlController::class, 'showHello']);
Route::get('read' ,[ControlController::class, 'userList']);
Route::post('insert' ,[ControlController::class, 'userCreate']);
Route::post('dinamiqInsert' ,[ControlController::class, 'dinamiqUserCreate']);
Route::post('update', [ControlController::class,'updateUser']);




//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
