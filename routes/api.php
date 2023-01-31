<?php


use App\Http\Controllers\RitualController;
use App\Http\Controllers\UploadPhotoController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::apiResource('/wer', 'UploadPhotoController');

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/ritual', [AuthController::class, 'ritual']);
});

//Route::post('/upload', [UploadPhotoController::class, 'upload']);
//Route::post('/replace', [UploadPhotoController::class, 'replace']);
//Route::post('/delete', [UploadPhotoController::class, 'delete']);


Route::group(['middleware' => 'api', 'prefix' => 'photo'], function ($router) {
    Route::post('/upload', [UploadPhotoController::class, 'upload']);
    Route::post('/replace', [UploadPhotoController::class, 'replace']);
    Route::delete('/{name}', [UploadPhotoController::class, 'delete']);
});


//Route::controller(UploadPhotoController::class)->group(['middleware' => 'api', 'prefix' => 'photo'], function () {
//    Route::post('/upload', 'upload');
////    Route::delete('/{id}', 'delete');
////    Route::get('/{name}', 'delete');
//});


Route::get('', function () {
    echo phpinfo();
//    return view('welcome');
});


//Route::get('/view', [UploadPhotoController::class, 'upload']);



Route::apiResource('ritual', RitualController::class);

