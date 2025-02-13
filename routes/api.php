<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\RitualController;
use App\Http\Controllers\RitualOrderController;
use App\Http\Controllers\UploadPhotoController;
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

//Route::group([
//    'middleware' => 'api',
//    'prefix' => 'auth'
//], function ($router) {
//    Route::post('/login', [AuthController::class, 'login']);
//    Route::post('/register', [AuthController::class, 'register']);
//    Route::post('/logout', [AuthController::class, 'logout']);
//    Route::post('/refresh', [AuthController::class, 'refresh']);
//    Route::get('/user-profile', [AuthController::class, 'userProfile']);
//});

Route::prefix('auth') -> group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

Route::prefix('photo') -> group(function () {
    Route::post('/upload', [UploadPhotoController::class, 'upload']);
    Route::post('/replace', [UploadPhotoController::class, 'replace']);
    Route::delete('/{name}', [UploadPhotoController::class, 'delete']);
});

Route::middleware('auth:api')->prefix('ritual') -> group(function () {
    Route::post('/upload', [RitualController::class, 'upload']);
    Route::post('/photo', [RitualController::class, 'photo']);
    Route::delete('/{name}', [RitualController::class, 'deletePhoto']);
    Route::get('/order?id={id}', [RitualController::class, 'view']);
    Route::delete('/{id}', [RitualController::class, 'deleteOrder']);
    Route::post('/edit', [RitualController::class, 'edit']);
    Route::post('/update', [RitualController::class, 'update']);
});

Route::middleware('auth:api')->prefix('order') -> group(function () {
    Route::get('/orders', [RitualOrderController::class, 'ordersList']);
    Route::post('/upload', [RitualOrderController::class, 'upload']);
    Route::get('/order?id={id}', [RitualOrderController::class, 'view']);
    Route::delete('/{id}', [RitualOrderController::class, 'deleteOrder']);
    Route::post('/edit', [RitualOrderController::class, 'edit']);
    Route::post('/update', [RitualOrderController::class, 'update']);
});

//Route::apiResource('ritualMiddleware', RitualController::class);


//Route::get('', function () {
//    echo phpinfo();
////    return view('welcome');
//});


//Route::get('/view', [UploadPhotoController::class, 'upload']);





