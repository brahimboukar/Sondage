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
Route::get('/getfonctionDetailscheck', [FonctionDetailsContoller::class , 'getfonctionDetailscheck']);
//Route::get('/get-data', [FonctionDetailsContoller::class , 'getData']);

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
    Route::get('/users/{id}/block', [AdminController::class, 'blockUser'])->name('users.block');
    Route::get('/users/{id}/unblock', [AdminController::class, 'unblockUser'])->name('users.unblock');


// Route Catégorie
    Route::get('/categorieRecomponse' , [AdminController::class , 'categorieRecomponse'])->name('admin.categorieRecomponse');
    Route::post('/addcategorieRecomponse' , [AdminController::class , 'addcategorieRecomponse'])->name('admin.addcategorieRecomponse');
    Route::delete('admin.categorieRecomponseSupp/{id}', [AdminController::class , 'categorieRecomponseSupp'])->name('admin.categorieRecomponseSupp');
    Route::put('categorieRecomponse/{id}/update', [AdminController::class , 'updateCategorieRecomponse']);

// Route Recomponse
    Route::get('/admin/recomponse', [AdminController::class , 'recomponse'])->name('admin.recomponse');
    Route::post('add', [AdminController::class , 'createRecomponse'])->name('admin.createRecomponse');
    Route::delete('admin.recomponseSupp/{id}', [AdminController::class , 'recomponseSupp'])->name('admin.recomponseSupp');
    Route::get('recomponse/{id}/edit',[AdminController::class , 'recomponsedit']);
    Route::put('recomponse/{id}/update',[AdminController::class , 'updateReco']);

// Route Edute
    Route::get('/admin/etude', [AdminController::class , 'edute'])->name('admin.edute');
    Route::post('addEdute', [AdminController::class , 'createEdute'])->name('admin.createEdute');
    Route::delete('admin.etudeSupp/{id}', [AdminController::class , 'eduteSupp'])->name('admin.etudeSupp');
    Route::put('etude/{id}/update', [AdminController::class , 'updateEtude']);

// Route Edute Cible
    Route::get('/admin/EtudeCible', [AdminController::class , 'eduteCible'])->name('admin.eduteCible');
    Route::post('/admin/addeduteCible', [AdminController::class , 'addeduteCible'])->name('admin.addeduteCible');
    Route::delete('admin.suppEduteCible/{id}', [AdminController::class , 'suppEduteCible'])->name('admin.suppEduteCible');
});

//Route User
Route::middleware(['auth','user-access:user'])->group(function (){
    Route::get('/home', [UserController::class , 'user'])->name('home');
    Route::get('produitDetailer/{id}',[UserController::class , 'produitDetailer'])->name('produitDetailer');
});
