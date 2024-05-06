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
Route::middleware(['auth'])->group(function (){
    Route::get('/admin/Dashboread', [AdminController::class , 'adminDashboread'])->name('admin');
    //Route utlisateur 
    Route::get('/admin/utilisateur', [AdminController::class , 'utilisateur'])->name('admin.utilisateur');
    Route::post('save', [AdminController::class , 'utilisateurSave'])->name('admin.utilisateurAdd');
    Route::delete('admin.utilisateurSupp/{id}', [AdminController::class , 'utilisateurSupp'])->name('admin.utilisateurSupp');
    Route::get('/search' , [AdminController::class , 'search'])->name('searchUtilisateur');
    // Route Recomponse
    Route::get('/admin/recomponse', [AdminController::class , 'recomponse'])->name('admin.recomponse');


    // Route Edute
    Route::get('/admin/etude', [AdminController::class , 'edute'])->name('admin.edute');
});

//Route User
Route::middleware(['auth','user-access:user'])->group(function (){
    Route::get('/home', [UserController::class , 'user'])->name('home');
});
