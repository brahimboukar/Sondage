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
// php artisan serve --host 192.168.192.2 --port 80
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('sexe' , [\App\Http\Controllers\Api\SexeController::class, 'add']);
Route::post('region' , [\App\Http\Controllers\Api\RegionController::class , 'add']);
Route::post('fonction' , [\App\Http\Controllers\Api\FonctionController::class , 'add']);
Route::post('fonctionDetails' , [\App\Http\Controllers\Api\FonctionDetailsContoller::class , 'add']);
