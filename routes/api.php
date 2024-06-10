<?php

use App\Http\Controllers\Api\CategorieRecomponseController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
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
Route::post('age' , [\App\Http\Controllers\Api\AgeController::class, 'add']);
Route::post('region' , [\App\Http\Controllers\Api\RegionController::class , 'add']);
Route::post('fonction' , [\App\Http\Controllers\Api\FonctionController::class , 'add']);
Route::post('fonctionDetails' , [\App\Http\Controllers\Api\FonctionDetailsContoller::class , 'add']);
Route::get('region' , [\App\Http\Controllers\Api\RegionController::class , 'list']);
Route::get('fonction' , [\App\Http\Controllers\Api\FonctionController::class , 'list']);
Route::post('register' , [RegisterController::class, 'register']);
Route::post('login' , [LoginController::class, 'login']);

Route::post('CategorieRecomponse', [CategorieRecomponseController::class, 'add']);
Route::get('/categories', [CategorieRecomponseController::class, 'list']);