<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\ProductController;
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

Route::get('show-hello', [TestController::class, 'showHello']);
Route::get('users-list', [TestController::class, 'userList']);

Route::post('create-user', [TestController::class, 'createUser']);

Route::post('update-user/{id}', [TestController::class, 'updateUser']);
Route::delete('delete-user/{id}', [TestController::class, 'deleteUser']);
Route::post('create-category', [CategoryController::class, 'createCategory']);
Route::post('create-product',[ProductController::class,'create']);
Route::get('categoryList',[CategoryController::class,'CategoryList']);
Route::get('categoryWithList',[CategoryController::class,'CategoryWithList']);



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
