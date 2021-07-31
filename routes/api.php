<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\FileController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| AUTH Routes
|--------------------------------------------------------------------------
*/

//Routs interact with UserController
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::get('userInfoById/{email:email}', [UserController::class, 'getUserInfoById']);

//Routs interact with AdminController
Route::post('CreateAdminAccount', [AdminController::class, 'register']);
Route::post('AdminLogin', [AdminController::class, 'login']);
//Route::get('AdminProfile/{email:email}', [AdminController::class, 'getAdminInfoById']);





//Routs interact with TestsController
Route::get('tests-info', [TestsController::class, 'getTestInfo']);
Route::get('tests-info/{id}', [TestsController::class, 'getTestInfoById']);
Route::post('add-test', [TestsController::class, 'addTest']);
Route::post('update-test/{id}', [TestsController::class, 'updateTest']);
Route::get('delete-test/{id}', [TestsController::class, 'deleteTest']);
//Route::get('removeTest/{test_id:test_id}', [TestsController::class, 'removeTest']);





//Routs interact with MessagesController
Route::get('messageInfo', [MessagesController::class, 'getMessageInfo']);
Route::post('send-message', [MessagesController::class, 'sendMessage']);

//Routs interact with FileController
//Route::get('messageInfo', [MessagesController::class, 'getMessageInfo']);
Route::post('file', [FileController::class, 'file']);
Route::get('ViewImages', [FileController::class, 'getFile']);


