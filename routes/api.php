<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LabreportsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\OfficersController;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\UserController;

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

//Routs interact with FileController
Route::post('file', [FileController::class, 'file']);
Route::get('view-images', [FileController::class, 'getFile']);

//Routs interact with TestsController
Route::get('tests-info', [TestsController::class, 'getTestInfo']);
Route::get('tests-info/{id}', [TestsController::class, 'getTestInfoById']);
Route::post('add-test', [TestsController::class, 'addTest']);
Route::post('update-test/{id}', [TestsController::class, 'updateTest']);
Route::get('delete-test/{id}', [TestsController::class, 'deleteTest']);

//Routs interact with OfficersController
Route::get('officers-info', [OfficersController::class, 'getOfficersInfo']);
Route::get('officers-info/{id}', [OfficersController::class, 'getOfficersInfoById']);
Route::post('add-officer', [OfficersController::class, 'addOfficer']);
Route::post('update-officer/{id}', [OfficersController::class, 'updateOfficer']);
Route::get('delete-officer/{id}', [OfficersController::class, 'deleteOfficer']);

//Routs interact with LabreportsController
Route::get('labreport', [LabreportsController::class, 'getLabreports']);
Route::post('create-labreport', [LabreportsController::class, 'addLabReport']);

//Routs interact with MessagesController
Route::get('messages-info', [MessagesController::class, 'getMessageInfo']);
Route::post('send-message', [MessagesController::class, 'sendMessage']);

/**
 *  For Future Development
 */
//Routs interact with AdminController
Route::post('create-adminAccount', [AdminController::class, 'register']);
Route::post('admin-login', [AdminController::class, 'login']);
