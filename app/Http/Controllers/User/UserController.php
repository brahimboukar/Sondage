<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Categorie_recomponse;
use App\Models\Recomponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function user()
    {
        $CategorieRecomponse = Categorie_recomponse::all();
        $recomponse = Recomponse::paginate(12);
        $recomponseCount = Recomponse::count();
        return view('User/home',[
            'CatReco' => $CategorieRecomponse,
            'recomponse' => $recomponse,
            'recomponseCount' => $recomponseCount
        ]);
    }

    public function produitDetailer($id){
        $recomponse = Recomponse::where('id',$id)->first();
        return view('User/produitDetailer',[
            'recomponse' => $recomponse,
        ]);
    }
}
