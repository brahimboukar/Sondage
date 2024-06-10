<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Categorie_recomponse;
use App\Models\Demande_recomponses;
use App\Models\Etude;
use App\Models\Fonction;
use App\Models\FonctionDetaile;
use App\Models\Recomponse;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function user(Request $request)
    {
        $CategorieRecomponse = Categorie_recomponse::all();
        //$rec = Recomponse::all();
        $minPoints = Recomponse::min('points');
        $maxPoints = Recomponse::max('points');
        //$sortBy = $request->get('sortBy', 'desc');
        // $order = $request->get('order', 'asc');
        // $recomponse = Recomponse::orderBy('points', $order)->paginate(12);
        $sortBy = $request->get('sortBy', 'created_at');
        $order = $request->get('order', 'asc');
        //filtrage par point
        $query = Recomponse::query();
        $min_points = $request->input('min_points');
        $max_points = $request->input('max_points');

        if (!is_null($min_points)) {
            $query->where('points', '>=', $min_points);
        }

        if (!is_null($max_points)) {
            $query->where('points', '<=', $max_points);
        }
        $recomponse = $query->orderBy($sortBy, $order)->get();
        $recomponseCount = Recomponse::count();
        $user = Auth::user();
        $query = Recomponse::query();
        if($request->id_categorie){
            $recomponse = $query->where(['id_categorie'=> $request->id_categorie])->paginate(12);
        }

        // if($request->min_point && $request->max_points){
        //     $minPoints = $request->input('min_points');
        //     $maxPoints = $request->input('max_points');

        //     $recomponse = $query->whereBetween('points', [$minPoints, $maxPoints])->get();
        // }


        return view('User/home',[
            'CatReco' => $CategorieRecomponse,
            'recomponse' => $recomponse,
            'recomponseCount' => $recomponseCount,
            'user' => $user,
            'minPoints' => $minPoints,
            'maxPoints' => $maxPoints,
            'sortBy' => $sortBy,
            'order' => $order,
        ]);
    }

    public function produitDetailer($id){
        $recomponse = Recomponse::where('id',$id)->first();
        $user = Auth::user();
        return view('User/produitDetailer',[
            'recomponse' => $recomponse,
            'user' => $user,
        ]);
    }
    public function profile(){
        $user = Auth::user();
        $region = Region::all();
        $fonction = Fonction::all();
        $fonctionDetailer = FonctionDetaile::take(6)->get();
        return view('User/profile',[
            'user' => $user,
            'region' => $region,
            'fonction' => $fonction,
            'fonctionDetailer' => $fonctionDetailer
        ]);
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // $request->validate([
        //     'nom' => 'required',
        //     'prenom' => 'required',
        //     'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        //     'telephone' => 'required|max:15',
        //     'id_sexe' => 'required|exists:sexes,id',
        //     'id_region' => 'required|exists:regions,id',
        //     'id_fonction' => 'required|exists:fonctions,id',
        //     'id_fonction_details' => 'required|exists:fonction_detailes,id',
        // ]);

        $user->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'id_sexe' => $request->id_sexe,
            'id_region' => $request->id_region,
            'id_fonction' => $request->id_fonction,
            'id_fonction_details' => $request->id_fonction_details
        ]);

        return redirect()->route('profile')->with('success', 'Profil mis à jour avec succès.');
    }

    public function filter(Request $request)
    {
        $categorie_ids = $request->input('categorie_ids');

        if ($categorie_ids) {
            $recompenses = Recomponse::whereIn('id_categorie', $categorie_ids)->get();
        } else {
            $recompenses = Recomponse::all();
        }

        return response()->json($recompenses);
    }

    public function DemandeRecomponse(Request $request)
    {
        $user = User::findOrFail($request->input('user_id'));
        $recomponse = Recomponse::findOrFail($request->input('recomponse_id'));

        if ($user->points < $recomponse->points) {
            return redirect()->route('home')->with('fail', 'Vous avez pas de solde de points');
        }
        $user->points -= $recomponse->points;
        $user->save();

        $demandeRecomponse = new Demande_recomponses();
        $demandeRecomponse->user_id = $user->id;
        $demandeRecomponse->recomponse_id = $recomponse->id;
        $demandeRecomponse->date = now();
        $demandeRecomponse->save();
        return redirect()->route('home')->with('succ' , 'Votre Demande à envoyer avec successe');
    }

    //public function updatePassword(Request $request, $id)

    // public function logout(Request $request)
    // {
    //     Auth::guard('web')->logout();
 
    //     $request->session()->invalidate();
 
    //     return redirect('/login');
    // }

    public function etude()
    {
        $user = Auth::user();
        $age = $user->age;
        $etudes = Etude::whereHas('sexes', function ($query) use ($user) {
            $query->where('sexe_id', $user->id_sexe);
        })->whereHas('regions', function ($query) use ($user) {
            $query->where('region_id', $user->id_region);
        })->whereHas('ages', function ($q) use ($age) {
            $q->where('ages.age_Min', '<=', $age)->where('ages.age_Max', '>=', $age);
        })->whereHas('fonctions', function ($query) use ($user) {
            $query->where('fonction_id', $user->id_fonction);
        })->whereHas('fonctionDetailes', function ($query) use ($user) {
            $query->where('fonction_detaile_id', $user->id_fonction_details);
        })->get();
        return view('User/etude',[
            'user' => $user,
            'etude' => $etudes,
        ]);
    }

    public function etudeDetailer($id){
        $etude = Etude::where('id',$id)->first();
        $user = Auth::user();
        return view('User/etudeDetailer',[
            'etude' => $etude,
            'user' => $user,
        ]);
    }

    public function logout()
{
    Auth::logout();
    return redirect()->route('login');
}
}
