<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Age;
use App\Models\Categorie_Etudes;
use App\Models\Categorie_recomponse;
use App\Models\Demande_recomponses;
use App\Models\Etude;
use App\Models\Etude_fonction;
use App\Models\Etude_region;
use App\Models\Etude_sexe;
use App\Models\evenement_users;
use App\Models\evenements;
use App\Models\Fonction;
use App\Models\FonctionDetaile;
use App\Models\Recomponse;
use App\Models\Region;
use App\Models\Sexe;
use App\Models\User;
use App\Rules\ContainsLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function adminDashboread(){
        $user = User::where('type','!=','1')->count();
        $nouveauxUtilisateurs = User::whereDate('created_at', today())->count();
        $recomponse = Recomponse::all()->count();
        $etude = Etude::all()->count();
        return view('Admin/Dashboread', [
            'user' => $user,
            'nouveauxUtilisateurs' => $nouveauxUtilisateurs,
            'recomponse' => $recomponse,
            'etude' => $etude,
        ]);
    }
    public function utilisateur(Request $request){
        $searchTerm = $request->input('searchTerm');

        $query = User::where('type', '!=', '1')->orderBy('nom');

        if (!empty($searchTerm)) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('nom', 'like', '%' . $searchTerm . '%')
                    ->orWhere('prenom', 'like', '%' . $searchTerm . '%');
            });
        }
       

        $user = $query->paginate(3);
        $regionData = Region::all();
        $fonctionf = Fonction::all();

        $message = '';
        if ($user->isEmpty()) {
            $message = 'Aucun Panéliste trouvé.';
        }
        return view('Admin/Utilisateur',[
            'user' => $user,
            'dataRegion' => $regionData,
            'dataf' => $fonctionf,
           'searchTerm' => $searchTerm,
           'message' => $message,
        ]);
    }

    public function utilisateurSave(Request $request)
    {
        $validator = Validator::make($request->all(),[
            // 'nom' => 'required',
            // 'prenom' => 'required',
            'email' => 'required|email|unique:users,email',
            // 'telephone' => 'required',
            // 'id_sexe' => 'required',
            // 'id_region' => 'required',
            // 'id_fonction' => 'required',
            // 'id_fonction_details' => 'required',
            // 'password' => 'required',
            'age' => 'required|integer|min:1|max:90',
            'email' => ['required', 'email', 'unique:users,email'],
        ],[
            'email.required' => 'L\'adresse email est requise.',
        'email.email' => 'Veuillez entrer une adresse email valide.',
        'email.unique' => 'Cette adresse email est déjà utilisée.',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.utilisateur')->with('faile','Email existe déjà');
        }
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'age' => $request->age,
            'telephone' => $request->telephone,
            'id_sexe' => $request->id_sexe,
            'id_region' => $request->id_region,
            'id_fonction' => $request->id_fonction,
            'id_fonction_details' => $request->id_fonction_details,
            'password' => Hash::make($request->password),
            'type' => "0"
        ]);
        if($user){
            return redirect()->route('admin.utilisateur')->with('success','Panéliste créé avec succès');
        }
        else{
            return back()->with('fail','Sommething wrong try again');
        }
    }
    
    public function utilisateurSupp(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.utilisateur')->with('succe','Panéliste Supprimer avec succès');
    }
    public function blockUser($id)
    {
        $user = User::findOrFail($id);
        $user->block();
        return redirect()->route('admin.utilisateur')->with('successbloque', 'Panéliste bloqué avec succès');
    }

    public function unblockUser($id)
    {
        $user = User::findOrFail($id);
        $user->unblock();
        return redirect()->route('admin.utilisateur')->with('successunbloque', 'Panéliste débloqué avec succès');
    }

    // public function search(Request $request)
    // {
    //     $searchTerm = $request->input('searchTerm');

    //     // Requête pour filtrer les utilisateurs par nom ou prénom
    //     $user = User::where('nom', 'LIKE', "%{$searchTerm}%")
    //                 ->orWhere('prenom', 'LIKE', "%{$searchTerm}%")
    //                 ->paginate(3);
    //     $regionData = Region::all();
    //     $fonctionf = Fonction::all();
    //     return view('Admin/utilisateur',[
    //         'user' => $user,
    //         'dataRegion' => $regionData,
    //         'dataf' => $fonctionf,
    //         'user' =>$user
    //     ]);

    //     return view('Admin/utilisateur', compact('user'));
    // }

    public function categorieRecomponse()
    {
        $categorieRecomponse = Categorie_recomponse::paginate(3);
        return view('Admin/RecomponseCategorie',[
            'categorieRecomponse' => $categorieRecomponse,
        ]);
    }

    // public function addcategorieRecomponse(Request $request)
    // {
    //     $request->validate([
    //         'libelle' => 'required',
    //     ]);
    //     $categorieRecomponse = Categorie_recomponse::create([
    //         'libelle' => $request->libelle,
    //     ]);
    //     if($categorieRecomponse){
    //         return redirect()->route('admin.categorieRecomponse')->with('success','Catégorie créé avec succès');
    //     }
    //     else{
    //         return back()->with('fail','Sommething wrong try again');
    //     }
    // }
    public function addcategorieRecomponse(Request $request)
{
    $request->validate([
        'libelle' => 'required',
    ]);

    // if déja trouver dans DB
    $existingCategorie = Categorie_recomponse::where('libelle', $request->libelle)->first();

    if ($existingCategorie) {
        // if déja trouver dans DB returner message error 
        return back()->with('fail', 'Cette catégorie a déjà été insérée.');
    }

    // si n'est pas trouver dans DB
    $categorieRecomponse = Categorie_recomponse::create([
        'libelle' => $request->libelle,
    ]);

    if($categorieRecomponse){
        return redirect()->route('admin.categorieRecomponse')->with('success', 'Catégorie créée avec succès');
    }
    else{
        return back()->with('fail', 'Quelque chose a mal tourné, réessayez.');
    }
}

    public function categorieRecomponseSupp(string $id)
    {
        $categorieRecomponse = Categorie_recomponse::findOrFail($id);
        $categorieRecomponse->delete();
        return redirect()->route('admin.categorieRecomponse')->with('succe','Catégorie Supprimer avec succès');
    }

    public function updateCategorieRecomponse(Request $request, int $id)
    {
        $request->validate([
            'libelle' => 'required',
        ]);

            $categorieRecomponse = Categorie_recomponse::where('id',$id)->first();
            $categorieRecomponse->libelle = $request->libelle;      
            $categorieRecomponse->save();
            return redirect()->route('admin.categorieRecomponse')->with('status','Catégorie Modifier avec succès');


    }
    public function recomponse(Request $request){
        $categorie = Categorie_recomponse::orderBy('libelle')->get();
        $query = Recomponse::query();
        //$recomponse = Recomponse::orderBy('points','DESC')->paginate(3);

        // if($request->ajax()){
        //     $recomponse = $query->where(['id_categorie'=> $request->categorie])->get();
        //     return response()->json(['recomponse' => $recomponse]);
        // }
        if($request->id_categorie){
            $recomponse = $query->where(['id_categorie'=> $request->id_categorie])->paginate(3);
        }
        else{
            $recomponse = Recomponse::orderBy('points','DESC')->paginate(3);
        }
        return view('Admin/Recomponse',[
            'cat' => $categorie,
            'recomponse' => $recomponse,
        ]);
    }

    public function createRecomponse(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
            'id_categorie' => 'required',
            'points' => 'required',
            'status' => 'required',
            'img' => 'required|mimes:png,jpg,jpeg,webp',
        ]);
        if($request->has('img')){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            
            $filename = time().'.'.$extension;

            $path = 'uploads/recomponse/';
            $file->move($path , $filename);
        }
        $recomponse = Recomponse::create([
            'libelle' => $request->libelle,
            'id_categorie' => $request->id_categorie,
            'points' => $request->points,
            'status' => $request->status,
            'img' => $path.$filename,
        ]);
        if($recomponse){
            return redirect()->route('admin.recomponse')->with('success','Récompense créé avec succès');
        }
        else{
            return back()->with('fail','Sommething wrong try again');
        }
    }
    public function recomponseSupp(string $id)
    {
        $recomponse = Recomponse::findOrFail($id);
        $recomponse->delete();
        return redirect()->route('admin.recomponse')->with('succe','Récompense Supprimer avec succès');
    }
    public function recomponsedit($id){
        $recomponse = Recomponse::where('id',$id)->first();
        $categorie = Categorie_recomponse::orderBy('libelle')->get();
        return view('Admin/RecomponseEdit',[
            'recomponse' => $recomponse,
            'cat' => $categorie
        ]);
    }
    public function updateReco(Request $request ,int $id)
    {
        $request->validate([
            'libelle' => 'required',
            'id_categorie' => 'required',
            'points' => 'required',
            'status' => 'required',
            'img' => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);
        $recomponse = Recomponse::where('id',$id)->first();
        if(isset($request->img)){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            
            $filename = time().'.'.$extension;

            $path = 'uploads/recomponse/';
            $file->move($path , $filename);

            if(File::exists($recomponse->img)){
                File::delete($recomponse->img);
            }
            $recomponse->img = $path.$filename;

            // $imageName = time().'.'.$request->img->extension();
            // $request->img->move(public_path('uploads/recomponse/'), $imageName);
            // $recomponse->img = $imageName;
        }

        // $recomponse = Recomponse::FindOrFail($id);
        
        // if($request->has('img')){
        //     $file = $request->file('img');
        //     $extension = $file->getClientOriginalExtension();
            
        //     $filename = time().'.'.$extension;

        //     $path = 'uploads/recomponse/';
        //     $file->move($path , $filename);

        //     if(File::exists($recomponse->img)){
        //         File::delete($recomponse->img);
        //     }
        // }

        // $recomponse->update([
        //     'libelle' => $request->libelle,
        //     'id_categorie' => $request->id_categorie,
        //     'points' => $request->points,
        //     'status' => $request->status,
        //     'img' => $path.$filename,
        // ]);
        // $recomponse = Recomponse::FindOrFail($request->id);
        $recomponse->libelle = $request->libelle;
        $recomponse->id_categorie = $request->id_categorie;
        $recomponse->points = $request->points;
        $recomponse->status = $request->status;
        $recomponse->save();
        // $recomponse->img = $request->libelle,
       
              return redirect()->route('admin.recomponse')->with('status','Récomponse Modifier avec succès');
    }

    public function categorieEtude()
    {
        $categorieEtude = Categorie_Etudes::paginate(3);
        return view('Admin/EtudeCategorie',[
            'categorieEtude' => $categorieEtude,
        ]);
    }

    public function createCategorieEtude (Request $request)
    {
        $request->validate([
            'libelle' => 'required',
        ]);

        $existingCategorie = Categorie_Etudes::where('libelle', $request->libelle)->first();
        
        if ($existingCategorie) {
            return back()->with('fail', 'Cette catégorie a déjà été insérée.');
        }

        $categorieEtude = Categorie_Etudes::create([
            'libelle' => $request->libelle,
        ]);
        if($categorieEtude){
            return redirect()->route('admin.categorieEtude')->with('success','Catégorie créé avec succès');
        }
        else{
            return back()->with('fail','Sommething wrong try again');
        }
    }

    public function categorieEtudeSupp(string $id)
    {
        $categorieEtude = Categorie_Etudes::findOrFail($id);
        $categorieEtude->delete();
        return redirect()->route('admin.categorieEtude')->with('succe','Catégorie Supprimer avec succès');
    }

    public function updateCategorieEtude(Request $request, int $id)
    {
        $request->validate([
            'libelle' => 'required',
        ]);

            $categorieEtude = Categorie_Etudes::where('id',$id)->first();
            $categorieEtude->libelle = $request->libelle;      
            $categorieEtude->save();
            return redirect()->route('admin.categorieEtude')->with('status','Catégorie Modifier avec succès');


    }


    public function edute(){
        $etude = Etude::orderBy('point','DESC')->paginate(3);
        $etudes = Etude::all();
        $categorieEtudes = Categorie_Etudes::all();
        return view('Admin/Edute',[
            'etude' => $etude,
            'etudes'=> $etudes,
            'categorieEtudes' => $categorieEtudes,
        ]);
    }
    public function createEdute(Request $request)
    {
        $request->validate([
            'lien' => ['required', 'string', 'regex:/\bhttps?:\/\/\S+\b/'],
        ], [
            'lien.required' => 'Le champ textarea est requis.',
            'lien.regex' => 'Le champ doit contenir un lien valide (URL).',
        ]);

    if ($request->hasFile('img')) {
        $file = $request->file('img');
        $extension = $file->getClientOriginalExtension();
        
        $filename = time().'.'.$extension;

        $path = 'uploads/etude/';
        $file->move($path , $filename);
    }
        $etude = Etude::create([
            'img' => $path.$filename,
            'id_categorie' => $request->id_categorie,
            'libelle' => $request->libelle,
            'description' => $request->description,
            'lien' => $request->lien,
            'durré' => $request->durré,
            'point' => $request->point,
        ]);

        if ($etude) {
            return redirect()->route('admin.edute')->with('success', 'Etude créée avec succès');
        } else {
            return redirect()->route('admin.edute')->with('fail', 'Quelque chose a mal tourné, essayez encore');
        }
        
    
}


    public function eduteSupp(string $id)
    {
        $edute = Etude::findOrFail($id);
        $edute->delete();
        return redirect()->route('admin.edute')->with('succe','Etude Supprimer avec succès');
    }

    public function updateEtude(Request $request, int $id)
    {
        $request->validate([
            'libelle' => 'required',
            'description' => 'required',
            'durré' => 'required',
            'point' => 'required',
            'lien' => 'required',
        ]);

            $etude = Etude::where('id',$id)->first();
            $etude->libelle = $request->libelle;      
            $etude->description = $request->description;
            $etude->durré = $request->durré;
            $etude->point = $request->point;
            $etude->lien = $request->lien;
            $etude->save();
            return redirect()->route('admin.edute')->with('succe','Etude Modifier avec succès');


    }

    public function eduteCible()
    {
        $etudelist =  Etude::all(); 
        $etude = Etude::paginate(3);
        $sexe = Sexe::all();
        $region = Region::all();
        $fonction = Fonction::all();
        $foncDe = FonctionDetaile::take(6)->get();
        $age = Age::all();
        //$etudeCible = Etude::paginate(2);
        return view('Admin/CiblesEtude',[
            'etudes' => $etude,
            'sexes' => $sexe,
            'regions' => $region,
            'fonctions' => $fonction,
            'foncDe' => $foncDe,
            'etudelist' => $etudelist,
            'age' => $age,
        ]);
    }

    public function addeduteCible(Request $request)
    {
        // $request->validate([
        //     'id_etude' => 'required',
        //     'id_sexe' => 'required',
        //     'id_region' => 'required',
        //     'id_fonction' => 'required',
        // ]);

        // $etudeSexe = Etude_sexe::create([
        //     'id_etude' => $request->id_etude,
        //     'id_sexe' => $request->id_sexe,
        // ]);

        // $etudeRegion = Etude_region::create([
        //     'id_etude' => $request->id_etude,
        //     'id_region' => $request->id_region,
        // ]);

        // $etudeFonction = Etude_fonction::create([
        //     'id_etude' => $request->id_etude,
        //     'id_fonction' => $request->id_fonction,
        // ]);

        // if($etudeSexe && $etudeRegion && $etudeFonction){
        //     return redirect()->route('admin.eduteCible')->with('success','Etude Cible Ajouter avec succès');
        // }
        $etude = Etude::find($request->input('id_etude'));
        if ($etude) {
            if ($request->has('sexes')) {
                $etude->sexes()->sync($request->input('sexes'));
            }
            if ($request->has('ages')) {
                $etude->ages()->sync($request->input('ages'));
            }
    
            if ($request->has('regions')) {
                $etude->regions()->sync($request->input('regions'));
            }
            //$fonctionss = $request->input('fonctions');
            if ($request->has('fonctions')) {
                // if($fonctionss == '3'){
                //     DB::table('etude_fonction_detailes')->insert([
                //         'fonction_detaile_id' => 13,
                //         'etude_id' => $etude
                //     ]);
                //     $etude->fonctionDetailes()->sync($request->input('fonctionDetailes'));
                // }
                $etude->fonctions()->sync($request->input('fonctions'));
            }
            $fonctionDetailes = $request->input('fonctionDetailes', []);
            //si id fonction = 3
            if (in_array(3, $request->input('fonctions', []))) {
                $fonctionDetailes[] = 13;
                $etude->fonctionDetailes()->sync($fonctionDetailes);
            }
            //si id fonction = 4
            if (in_array(4, $request->input('fonctions', []))) {
                $fonctionDetailes[] = 14;
                $etude->fonctionDetailes()->sync($fonctionDetailes);
            }
            //si id fonction = 5
            if (in_array(5, $request->input('fonctions', []))) {
                $fonctionDetailes[] = 14;
                $etude->fonctionDetailes()->sync($fonctionDetailes);
            }
            //si id fonction = 6
            if (in_array(6, $request->input('fonctions', []))) {
                $fonctionDetailes[] = 14;
                $etude->fonctionDetailes()->sync($fonctionDetailes);
            }
            //si id fonction = 7
            if (in_array(7, $request->input('fonctions', []))) {
                $fonctionDetailes[] = 14;
                $etude->fonctionDetailes()->sync($fonctionDetailes);
            }



            if ($request->has('fonctionDetailes')) {
                $etude->fonctionDetailes()->sync($request->input('fonctionDetailes'));

                // 
            }
            return redirect()->route('admin.eduteCible')->with('success','Etude Cible Ajouter avec succès');
        }
       
            return redirect()->route('admin.eduteCible')->with('error', 'Etude not found');

    }
    public function suppEduteCible($id)
    {
        $etude = Etude::findOrFail($id);
        $etude->sexes()->detach();
        $etude->ages()->detach();
        $etude->regions()->detach();
        $etude->fonctions()->detach();
        $etude->fonctionDetailes()->detach();
        //$etude->delete();
        return redirect()->route('admin.eduteCible')->with('succ', 'Etude Cible supprimée avec succès');
    }

    public function DemandeRecomponse()
    {
        $demandeRec = Demande_recomponses::paginate(3);
        return view('Admin/DemandeRecomponse',[
            'demandeRec' => $demandeRec
        ]);
    }

    public function suppDemandeRecomponse($id)
    {
        $demandeRec = Demande_recomponses::findOrFail($id);
        $demandeRec->delete();
        return redirect()->route('admin.DemandeRecomponse')->with('succe','Demande Supprimer avec succès');
    }

    public function changeEtat($id, $etat)
    {
        $demandeRecomponse = Demande_recomponses::find($id);
        $demandeRecomponse->etat = $etat;
        $demandeRecomponse->save();

        return redirect()->back()->with('success', 'Etat changé avec succès');
    }



    public function evenement(){
        $evenement = evenements::paginate(3);
        return view('Admin/evenementAdmin',[
            'evenement' => $evenement,
        ]);
    }

    public function addEvenement(Request $request)
    {
        $request->validate([
            'lien' => ['required', 'string', 'regex:/\bhttps?:\/\/\S+\b/'],
        ], [
            'lien.required' => 'Le champ textarea est requis.',
            'lien.regex' => 'Le champ doit contenir un lien valide (URL).',
        ]);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            
            $filename = time().'.'.$extension;
    
            $path = 'uploads/evenement/';
            $file->move($path , $filename);
        }
            $evenement = evenements::create([
                'img' => $path.$filename,
                'libelle' => $request->libelle,
                'description' => $request->description,
                'date_Debut' => $request->date_Debut,
                'date_Fin' => $request->date_Fin,
                'lien' => $request->lien,

            ]);
    
            if ($evenement) {
                return redirect()->route('admin.evenement')->with('success', 'Événement créée avec succès');
            } else {
                return redirect()->route('admin.evenement')->with('fail', 'Quelque chose a mal tourné, essayez encore');
            }
    }

    public function evenementSupp(string $id)
    {
        $evenement = evenements::findOrFail($id);
        $evenement->delete();
        return redirect()->route('admin.evenement')->with('succe','Événement Supprimer avec succès');
    }


    public function updateEvenement(Request $request, int $id)
    {
        $request->validate([
            'libelle' => 'required',
            'description' => 'required',
            'date_Debut' => 'required',
            'date_Fin' => 'required',
        ]);

            $evenement = evenements::where('id',$id)->first();
            $evenement->libelle = $request->libelle;      
            $evenement->description = $request->description;
            $evenement->date_Debut = $request->date_Debut;
            $evenement->date_Fin = $request->date_Fin;
            $evenement->save();
            return redirect()->route('admin.evenement')->with('succe','Événement Modifier avec succès');


    }




    public function ParticipantEvenement()
    {
        $evenements = evenements::with('utilisateurs')->get();
        return view('Admin/ParticipantEvenement',[
            'evenements' => $evenements,
        ]);
    }

    public function participantSupp($user_id, $evenement_id)
    {
        $evenementUser = evenement_users::where('user_id', $user_id)
                                       ->where('evenement_id', $evenement_id)
                                       ->first();

        if ($evenementUser) {
            $evenementUser->delete();
            return redirect()->back()->with('success', 'Participant supprimé avec succès.');
        } else {
            return redirect()->back()->with('error', 'Participant non trouvé.');
        }
    }


    public function AdminProfile()
    {
        $user = Auth::user();
        $region = Region::all();
        $fonction = Fonction::all();
        $fonctionDetailer = FonctionDetaile::take(6)->get();
        return view('Admin/Profile', [
            'user' => $user,
            'region' => $region,
            'fonction' => $fonction,
            'fonctionDetailer' => $fonctionDetailer
        ]);
    }

    public function updateProfileAdmin(Request $request, $id)
    {
        $user = User::findOrFail($id);

        

        $user->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
        ]);

        return redirect()->route('admin.profile')->with('success', 'Profil mis à jour avec succès.');
    }
    public function updatePasswordAdmin(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:5',
        ]);

        $user = User::find($request->id);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('admin.profile')->withErrors(['current_password' => 'Mot de passe actuel incorrect']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Mot de passe mis à jour avec succès');
    }

    
}
