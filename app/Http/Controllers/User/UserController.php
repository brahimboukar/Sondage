<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Categorie_Etudes;
use App\Models\Categorie_recomponse;
use App\Models\Demande_recomponses;
use App\Models\Etude;
use App\Models\Etude_users;
use App\Models\evenement_users;
use App\Models\evenements;
use App\Models\Fonction;
use App\Models\FonctionDetaile;
use App\Models\Recomponse;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function user(Request $request)
    // {
    //     $CategorieRecomponse = Categorie_recomponse::all();
    //     //$rec = Recomponse::all();
    //     $minPoints = Recomponse::min('points');
    //     $maxPoints = Recomponse::max('points');
    //     //$sortBy = $request->get('sortBy', 'desc');
    //     // $order = $request->get('order', 'asc');
    //     // $recomponse = Recomponse::orderBy('points', $order)->paginate(12);
    //     // $sortBy = $request->get('sortBy', 'created_at');
    //     // $order = $request->get('order', 'asc');
    //     //filtrage par point
    //     $query = Recomponse::query();
    //     $min_points = $request->input('min_points');
    //     $max_points = $request->input('max_points');

    //     if (!is_null($min_points)) {
    //         $query->where('points', '>=', $min_points);
    //     }

    //     if (!is_null($max_points)) {
    //         $query->where('points', '<=', $max_points);
    //     }
    //     $recomponse = $query->get();
    //     $sortBy = $request->get('sortBy', 'points');
    //     $order = $request->get('order', 'desc');

       

        

    //     $recomponse = Recomponse::orderBy($sortBy, $order)->get();

    //     if ($sortBy === 'demande_recomponses_count') {
    //         $query->leftJoin('demande_recomponses as d', 'recomponses.id', '=', 'd.recomponse_id')
    //               ->select('recomponses.*', DB::raw('COUNT(d.id) as demande_recomponses_count'))
    //               ->groupBy('recomponses.id')
    //               ->orderBy('demande_recomponses_count', $order);
    //     } else {
    //         $query->orderBy($sortBy, $order);
    //     }

        
    //     if ($request->ajax()) {
    //         $recomponse = $query->get();
    //         return response()->json($recomponse);
    //     }

       
    //     $recomponse = $query->get();
    //     $recomponseCount = Recomponse::count();
    //     $user = Auth::user();
    //     $query = Recomponse::query();
    //     if($request->id_categorie){
    //         $recomponse = $query->where(['id_categorie'=> $request->id_categorie])->paginate(12);
    //     }

    //     return view('User/home',[
    //         'CatReco' => $CategorieRecomponse,
    //         'recomponse' => $recomponse,
    //         'recomponseCount' => $recomponseCount,
    //         'user' => $user,
    //         'minPoints' => $minPoints,
    //         'maxPoints' => $maxPoints,
    //         'sortBy' => $sortBy,
    //         'order' => $order,
    //     ]);
    // }
    
//     public function user(Request $request)
// {
//     $CategorieRecomponse = Categorie_recomponse::all();
//     $minPoints = Recomponse::min('points');
//     $maxPoints = Recomponse::max('points');

//     $query = Recomponse::with('categorie_recomponse');
//     $min_points = $request->input('min_points');
//     $max_points = $request->input('max_points');

//     if (!is_null($min_points)) {
//         $query->where('points', '>=', $min_points);
//     }
//     if (!is_null($max_points)) {
//         $query->where('points', '<=', $max_points);
//     }

//     $sortBy = $request->get('sortBy', 'points');
//     $order = $request->get('order', 'desc');

//     if ($sortBy === 'demande_recomponses_count') {
//         $query->leftJoin('demande_recomponses as d', 'recomponses.id', '=', 'd.recomponse_id')
//               ->select('recomponses.*', DB::raw('COUNT(d.id) as demande_recomponses_count'))
//               ->groupBy('recomponses.id')
//               ->orderBy('demande_recomponses_count', $order);
//     } else {
//         $query->orderBy($sortBy, $order);
//     }

    
//     //$recomponse = $query->with('categorie_recomponse')->get();
//     $recomponse = $query->paginate(8);
//     if ($request->ajax()) {
//         //$recomponse = $query->with('categorie_recomponse')->paginate(8);
//         return response()->json([
//             'data' => $recomponse->items(),
//             'links' => (string) $recomponse->links(),
//             'current_page' => $recomponse->currentPage(),
//             'last_page' => $recomponse->lastPage()
//         ]);
//     }
//     $recomponse = $query->paginate(8);
//     $recomponseCount = Recomponse::count();
//     $user = Auth::user();

//     if ($request->id_categorie) {
//         $recomponse = $query->where(['id_categorie' => $request->id_categorie])->paginate(12);
//     }

   



//     return view('User/home', [
//         'CatReco' => $CategorieRecomponse,
//         'recomponse' => $recomponse,
//         'recomponseCount' => $recomponseCount,
//         'user' => $user,
//         'minPoints' => $minPoints,
//         'maxPoints' => $maxPoints,
//         'sortBy' => $sortBy,
//         'order' => $order,
//     ]);
// }
public function user(Request $request)
{
    $CategorieRecomponse = Categorie_recomponse::all();
    $minPoints = Recomponse::min('points');
    $maxPoints = Recomponse::max('points');

    $query = Recomponse::with('categorie_recomponse');
    $min_points = $request->input('min_points');
    $max_points = $request->input('max_points');
    $id_categories = $request->input('id_categories', []); 

    if (!is_null($min_points)) {
        $query->where('points', '>=', $min_points);
    }
    if (!is_null($max_points)) {
        $query->where('points', '<=', $max_points);
    }
    if (!empty($id_categories)) {
        $query->whereIn('id_categorie', $id_categories);
    }

    $sortBy = $request->get('sortBy', 'points');
    $order = $request->get('order', 'desc');

    if ($sortBy === 'demande_recomponses_count') {
        $query->leftJoin('demande_recomponses as d', 'recomponses.id', '=', 'd.recomponse_id')
              ->select('recomponses.*', DB::raw('COUNT(d.id) as demande_recomponses_count'))
              ->groupBy('recomponses.id')
              ->orderBy('demande_recomponses_count', $order);
    } else {
        $query->orderBy($sortBy, $order);
    }

    $recomponse = $query->paginate(12);

    if ($request->ajax()) {
        return response()->json([
            'data' => $recomponse->items(),
            'links' => (string) $recomponse->links(),
            'current_page' => $recomponse->currentPage(),
            'last_page' => $recomponse->lastPage()
        ]);
    }

    $recomponseCount = Recomponse::count();
    $user = Auth::user();

    return view('User/home', [
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

        return redirect()->route('profile')->with('success', 'Votre Profil mis à jour avec succès.');
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

    // public function etude(Request $request, $id = null)
    // {
    //     $user = Auth::user();
    //     $age = $user->age;
    //     $etudesQuery = Etude::whereHas('sexes', function ($query) use ($user) {
    //         $query->where('sexe_id', $user->id_sexe);
    //     })->whereHas('regions', function ($query) use ($user) {
    //         $query->where('region_id', $user->id_region);
    //     })->whereHas('ages', function ($q) use ($age) {
    //         $q->where('ages.age_Min', '<=', $age)->where('ages.age_Max', '>=', $age);
    //     })->whereHas('fonctions', function ($query) use ($user) {
    //         $query->where('fonction_id', $user->id_fonction);
    //     })->whereHas('fonctionDetailes', function ($query) use ($user) {
    //         $query->where('fonction_detaile_id', $user->id_fonction_details);
    //     });
    //     if ($id && $id !== 'all') {
    //         $etudesQuery->where('id_categorie', $id);
    //     }

    //     $etudes = $etudesQuery->get();

    //     $categorieEtude = Categorie_Etudes::all();

    //     // dd($etudes);

    //     if ($request->ajax()) {
    //         dd($etudes);
    //         return response()->json($etudes);
    //     }
    //     return view('User/etude',[
    //         'user' => $user,
    //         'etude' => $etudes,
    //         'categorieEtude' => $categorieEtude,
    //     ]);
    // }
    public function etude(Request $request, $id = null)
    {
        $user = Auth::user();
        $age = $user->age;

        $etudesQuery = Etude::with('categorie_etude')
            ->whereHas('sexes', function ($query) use ($user) {
                $query->where('sexe_id', $user->id_sexe);
            })
            ->whereHas('regions', function ($query) use ($user) {
                $query->where('region_id', $user->id_region);
            })
            ->whereHas('ages', function ($q) use ($age) {
                $q->where('ages.age_Min', '<=', $age)->where('ages.age_Max', '>=', $age);
            })
            ->whereHas('fonctions', function ($query) use ($user) {
                $query->where('fonction_id', $user->id_fonction);
            })
            ->whereHas('fonctionDetailes', function ($query) use ($user) {
                $query->where('fonction_detaile_id', $user->id_fonction_details);
            });

        if ($id && $id !== 'all') {
            $etudesQuery->where('id_categorie', $id);
        }
        $min_points = $request->input('min_points');
        $max_points = $request->input('max_points');

        if (!is_null($min_points)) {
            $etudesQuery->where('point', '>=', $min_points);
        }

        if (!is_null($max_points)) {
            $etudesQuery->where('point', '<=', $max_points);
        }

        // Handle sorting
        $sortBy = $request->get('sortBy', 'point');
        $order = $request->get('order', 'desc');

        $etudes = $etudesQuery->orderBy($sortBy, $order)->get();

        $categorieEtude = Categorie_Etudes::whereIn('id', $etudes->pluck('id_categorie')->unique())->get();

        if ($request->ajax()) {
            return response()->json($etudes);
        }

        return view('User.etude', [
            'user' => $user,
            'etude' => $etudes,
            'categorieEtude' => $categorieEtude,
            'sortBy' => $sortBy,
            'order' => $order,
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

    public function EtudeUsers(Request $request,$id,$userId,$idEtude)
    {
        $user = User::findOrFail($request->input('user_id'));
        $etude = Etude::findOrFail($request->input('etude_id'));
        //$etudelien = Etude::findOrFail($request->input('lien'));
        //$etudes = Etude::find($id);
        $etudeUser = new Etude_users();
        $etudeUser->user_id = $user->id;
        $etudeUser->etude_id = $etude->id;
        $etudeUser->date = now();
        
        $etudeUser->save();
        $redirectUrl = $etude->lien . '?id=' . $userId.'/&&idEtude='.$idEtude;
        return redirect($redirectUrl);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:5',
        ]);

        $user = User::find($request->id);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('profile')->withErrors(['current_password' => 'Mot de passe actuel incorrect']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile')->with('success', 'Votre Mot de passe mis à jour avec succès');
    }

    public function produitCart()
    {
        $user = Auth::user();
        $demandes = Demande_recomponses::with('recomponse')
            ->where('user_id', $user->id)->get();
        return view('User/produitCart',[
            'user' => $user,
            'demandes' => $demandes,
        ]);

    }

    public function evenement()
    {
        $user = Auth::user();
        $evenement = evenements::all();

        return view('User/evenement',[
            'user' => $user,
            'evenement' => $evenement,
        ]);
    }

    public function evenementDetailer($id){
        $evenement = evenements::where('id',$id)->first();
        $user = Auth::user();
        return view('User/evenementDetailer',[
            'evenement' => $evenement,
            'user' => $user,
        ]);
    }

    // public function sendEmail(Request $request)
    // {
    //     if($this->isOnline()){
    //        $user = Auth::user();
    //        $mail_data = [
    //         'recipient' => 'boukarb925@gmail.com',
    //         'fromEmail' => $user->email,
    //         'fromName' => $user->nom . ' ' . $user->prenom,
    //         'subject' => 'Invitation évenement',
    //         'body' => 'Vous Invieter cette évenement'
    //        ];
    //        Mail::send('User/email-template',$mail_data, function($message) use ($mail_data){
    //         $message->to($mail_data['recipient'])
    //         ->from($mail_data['fromEmail'],$mail_data['fromName'])
    //         ->subject($mail_data['subject']);
    //        });
    //        return redirect()->back()->with('success','Votre Demande à envoyer!!');
    //     }
    //     else {
    //         return 'No Connect';
    //     }
    // }
    // public function sendEmail(Request $request)
    // {
    //     if($this->isOnline()){
    //         $user = Auth::user();
    //         $fullName = $user->nom . ' ' . $user->prenom;
    //         $libelle = $request->input('libelle');
            
    //         $mail_data = [
    //             'recipient' => 'boukarb925@gmail.com',
    //             'fromEmail' => $user->email,
    //             'fromName' => $fullName,
    //             'subject' => 'Demande d\'invitation à cet événement : ',
    //             'body' => '',
    //             'id_user' => $user->id,
    //             'nom' => $user->nom,
    //             'prenom' => $user->prenom,
    //             'email' => $user->email,
    //             'libelle' => $libelle,
    //             'tele' => $user->telephone,
    //         ];

    //         Mail::send('User/email-template', $mail_data, function($message) use ($mail_data) {
    //             $message->to($mail_data['recipient'])
    //                     ->from($mail_data['fromEmail'], $mail_data['fromName'])
    //                     ->subject($mail_data['subject'])
    //                     ->replyTo($mail_data['fromEmail'], $mail_data['fromName']);
    //         });

    //         // Insertion dans la table evenement_users
    //         $usera = User::findOrFail($user->id);
    //         $evenement = evenements::findOrFail($request->input('evenement_id'));
    //         $evenementUser = new evenement_users();
    //         $evenementUser->user_id = $usera->id;
    //         $evenementUser->evenement_id = $evenement->id;
    //         $evenementUser->date = now();
    //         $evenementUser->save();

    //         return redirect()->back()->with('success', 'Votre demande a été envoyée et enregistrée avec succès !');
    //     } else {
    //         return 'Pas de connexion';
    //     }
    // }
    public function sendEmail(Request $request)
{
    if ($this->isOnline()) {
        $user = Auth::user();
        $fullName = $user->nom . ' ' . $user->prenom;
        $libelle = $request->input('libelle');

        $mail_data = [
            'recipient' => 'boukarb925@gmail.com', // Remplacez par l'email de l'administrateur
            'fromEmail' => $user->email,
            'fromName' => $fullName,
            'subject' => 'Demande d\'invitation à cet événement : ',
            'body' => '',
            'id_user' => $user->id,
            'nom' => $user->nom,
            'prenom' => $user->prenom,
            'email' => $user->email,
            'libelle' => $libelle,
            'tele' => $user->telephone,
        ];

        Mail::send('User/email-template', $mail_data, function ($message) use ($mail_data) {
            $message->to($mail_data['recipient'])
                    ->from('noreply@monentreprise.com', $mail_data['fromName']) // Remplacez par votre adresse email
                    ->subject($mail_data['subject'])
                    ->replyTo($mail_data['fromEmail'], $mail_data['fromName']);
        });

        // Insertion dans la table evenement_users
        $usera = User::findOrFail($user->id);
        $evenement = evenements::findOrFail($request->input('evenement_id'));
        $evenementUser = new evenement_users();
        $evenementUser->user_id = $usera->id;
        $evenementUser->evenement_id = $evenement->id;
        $evenementUser->date = now();
        $evenementUser->save();

        return redirect()->route('evenement')->with('success', 'Votre Demande à envoyée et enregistrée avec succès');
    } else {
        return 'Pas de connexion';
    }
}



    public function isOnline($site = "https://www.youtube.com/") {
        if(@fopen($site, 'r')){
            return true;
        }
        else{
            return false;
        }
    }


    public function evenementUser(Request $request)
    {
        $user = User::findOrFail($request->input('user_id'));
        $evenement = evenements::findOrFail($request->input('evenement_id'));
        //$etudelien = Etude::findOrFail($request->input('lien'));
        //$etudes = Etude::find($id);
        $evenementUser = new evenement_users();
        $evenementUser->user_id = $user->id;
        $evenementUser->evenement_id = $evenement->id;
        $evenementUser->date = now();
        
        $evenementUser->save();
        //. '?id=' . $userId.'/&&idEtude='.$idEtude
        $redirectUrl = $evenement->lien ;

        return redirect($redirectUrl);
    }
}
