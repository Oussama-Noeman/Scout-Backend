<?php

use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\UserController;
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

Route::get('/test-api', function () {
    return ["Result" => "Api Successfully"];
});

Route::post('/login', [UserController::class, 'index']);

Route::group(['middleware' => 'auth:sanctum'], function () {

//Playlists Api Routing
Route::get('/playlists', [DataController::class, 'playlists']);
Route::get('/playlist/{id}', [DataController::class, 'getPlaylist']);
Route::get('/playlist/{id}/videos', [DataController::class, 'getPlaylistVideos']);

//Videos Api Routing
Route::get('/videos', [DataController::class, 'videos']);
Route::get('/video/{id}', [DataController::class, 'getVideo']);

//Books Api Routing
Route::get('/books', [DataController::class, 'books']);
Route::get('/book/{id}', [DataController::class, 'getBook']);
});

