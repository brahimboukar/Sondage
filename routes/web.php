<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Api\FonctionDetailsContoller;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
Route::get('/get-data', [FonctionDetailsContoller::class , 'getData']);

//Route Inscription
Route::post('register' , [Register::class, 'registerSave'])->name('register.save');


//Route Login
Route::get('login', [Login::class ,'login'])->name('login');
Route::post('login', [Login::class , 'loginAction'])->name('login.action');

Route::get('/logout' ,[Login::class , 'logout'])->name('logout');

//Route Logout
//Route::get('logout', [Login::class ,'logout'])->middleware('auth')->name('logout');


// Route::controller(AuthController::class)->group(function () {
//     Route::get('/register','register')->name('register');
//     Route::post('/getfonctionDetails','getfonctionDetails');
//     Route::get('/getfonctionDetailscheck','getfonctionDetailscheck');

//     Route::post('register' ,'registerSave')->name('register.save');
//     Route::get('login','login')->name('login');
//     Route::post('login','loginAction')->name('login.action');
//     Route::get('logout', 'logout')->middleware('auth')->name('logout');
// });

//Route Admin
    Route::middleware(['auth','user-access:admin','noback'])->group(function (){
    Route::get('/admin/Dashboread', [AdminController::class , 'adminDashboread'])->name('admin');
    //Route utlisateur 
    Route::get('/admin/utilisateur', [AdminController::class , 'utilisateur'])->name('admin.utilisateur');
    Route::post('save', [AdminController::class , 'utilisateurSave'])->name('admin.utilisateurAdd');
    Route::delete('admin.utilisateurSupp/{id}', [AdminController::class , 'utilisateurSupp'])->name('admin.utilisateurSupp');
    //Route::post('/search-users', [AdminController::class, 'search'])->name('search.users');
    Route::get('/users/{id}/block', [AdminController::class, 'blockUser'])->name('users.block');
    Route::get('/users/{id}/unblock', [AdminController::class, 'unblockUser'])->name('users.unblock');
    //Route::get('logout', [AdminController::class ,'logout'])->middleware('auth')->name('logout');

    
    

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
// Route Categorie Etude
    Route::get('/categorieEtude' , [AdminController::class , 'categorieEtude'])->name('admin.categorieEtude');
    Route::post('/createCategorieEtude', [AdminController::class , 'createCategorieEtude'])->name('admin.createCategorieEtude');
    Route::delete('admin.categorieEtudeSupp/{id}', [AdminController::class ,'categorieEtudeSupp'])->name('admin.categorieEtudeSupp');
    Route::put('categorieEtude/{id}/update', [AdminController::class , 'updateCategorieEtude'])->name('admin.updateCategorieEtude');
    
// Route Edute
    Route::get('/admin/etude', [AdminController::class , 'edute'])->name('admin.edute');
    Route::post('/createEdute', [AdminController::class , 'createEdute'])->name('admin.createEdute');
    Route::delete('admin.etudeSupp/{id}', [AdminController::class , 'eduteSupp'])->name('admin.etudeSupp');
    Route::put('etude/{id}/update', [AdminController::class , 'updateEtude']);

// Route Edute Cible
    Route::get('/admin/EtudeCible', [AdminController::class , 'eduteCible'])->name('admin.eduteCible');
    Route::post('/admin/addeduteCible', [AdminController::class , 'addeduteCible'])->name('admin.addeduteCible');
    Route::delete('admin.suppEduteCible/{id}', [AdminController::class , 'suppEduteCible'])->name('admin.suppEduteCible');


// Route Demande Recomponse
    Route::get('/admin/DemandeRecomponse', [AdminController::class , 'DemandeRecomponse'])->name('admin.DemandeRecomponse');
    Route::delete('admin.suppDemandeRecomponse/{id}', [AdminController::class , 'suppDemandeRecomponse'])->name('admin.suppDemandeRecomponse');

    // Route Evenement
    Route::get('/admin/Evenement', [AdminController::class , 'evenement'])->name('admin.evenement');
    Route::post('/admin/addEvenement', [AdminController::class , 'addEvenement'])->name('admin.addEvenement');
    Route::delete('admin/suppEvenement/{id}', [AdminController::class , 'evenementSupp'])->name('admin.evenementSupp');
    Route::put('evenement/{id}/update', [AdminController::class , 'updateEvenement']);


    //Route Participant evenement
    Route::get('/admin/participantEvenement', [AdminController::class , 'participantEvenement'])->name('admin.ParticipantEvenement');
    Route::delete('/admin/participant/{user_id}/{evenement_id}', [AdminController::class, 'participantSupp'])->name('admin.participantSupp');


   
});

//Route User

Route::middleware(['auth', 'user-access:user','noback'])->group(function (){
    Route::get('/home', [UserController::class , 'user'])->name('home');
    Route::get('/produit', [UserController::class , 'user'])->name('produit');
    Route::get('produitDetailer/{id}',[UserController::class , 'produitDetailer'])->name('produitDetailer');
    Route::get('/profile', [UserController::class , 'profile'])->name('profile');
    Route::put('profile/{id}/update', [UserController::class , 'updateProfile']);
    Route::post('/recompenses/filter', [UserController::class, 'filter']);
    Route::get('/home/filterPoint', [UserController::class, 'filterPoint'])->name('filterPoint');
    //Route::get('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');
    Route::post('/demande', [UserController::class, 'DemandeRecomponse'])->name('DemandeRecomponse');
    
    Route::get('/reponses/plus-demandees', 'ReponseController@plusDemandees')->name('reponses.plus-demandees');

    Route::get('/filter-points', [UserController::class, 'filterPoints']);


    //Route List Etude
    Route::get('/etude', [UserController::class , 'etude'])->name('etude');
    Route::get('etudeDetailer/{id}',[UserController::class , 'etudeDetailer'])->name('etudeDetailer');
    Route::get('/etudes/filter/{id}', [UserController::class, 'etude'])->name('etudes.filter');

    Route::post('/EtudeUsers/{etudeId}/user/{userId}/etude/{idEtude}' ,[UserController::class , 'EtudeUsers'])->name('EtudeUsers');
    Route::post('update-password', [UserController::class, 'updatePassword'])->name('password.update');


    //Route produitCart
    Route::get('/produitCart', [UserController::class , 'produitCart'])->name('produitCart');
    
    // Evenement 
    Route::get('/evenement', [UserController::class , 'evenement'])->name('evenement');
    Route::get('/evenementDetailer/{id}',[UserController::class , 'evenementDetailer'])->name('evenementDetailer');

    // envoyer email 
    Route::post('/send-email', [UserController::class, 'sendEmail'])->name('send.email');

    //Route Redirection vers lien evenement

    Route::post('/evenementUser' ,[UserController::class , 'evenementUser'])->name('evenementUser');
});
