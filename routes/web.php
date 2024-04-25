<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Api\FonctionDetailsContoller;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/register',[\App\Http\Controllers\Register::class , 'register'])->name('register');
Route::post('/getfonctionDetails', [FonctionDetailsContoller::class , 'getfonctionDetails']);

//Route Inscription
Route::post('register' , [Register::class, 'registerSave'])->name('register.save');


//Route Login
Route::get('login', [Login::class ,'login'])->name('login');
Route::post('login', [Login::class , 'loginAction'])->name('login.action');

//Route Admin
Route::get('/admin', [AdminController::class , 'admin'])->name('admin/home');

//Route User
Route::get('/user', [UserController::class , 'user'])->name('home');
