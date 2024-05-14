<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie_recomponse;
use App\Models\Etude;
use App\Models\Fonction;
use App\Models\Recomponse;
use App\Models\Region;
use App\Models\Sexe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function utilisateur(){
        $user = User::where('type','!=','1')->orderBy('nom')->paginate(4);
        $regionData = Region::all();
        $fonctionf = Fonction::all();
        return view('Admin/utilisateur',[
            'user' => $user,
            'dataRegion' => $regionData,
            'dataf' => $fonctionf,
            //'userbySexe' =>$userbySexe
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
            return redirect()->route('admin.utilisateur')->with('success','Utlisateur créé avec succès');
        }
        else{
            return back()->with('fail','Sommething wrong try again');
        }
    }

    public function utilisateurSupp(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.utilisateur')->with('succe','Utlisateur Supprimer avec succès');
    }

    public function search(Request $request){
        // $search = $request->search;
        // $query = User::query();
        // $query->whereAny(['nom','prenom'],'LIKE',"%$search%");
        // $users = $query->get();
        // return view('Admin/utilisateur',[
        //     'users' => $users
        // ]);
        // $dt = $request->input('query');
        // $regionData = Region::all();
        // $fonctionf = Fonction::all();
        // $user = DB::table('users')->where('nom', 'like' , '%' .$dt. '%')->get();
        // return view('Admin/utilisateur',[
        //     'user' => $user,
        //     'dataRegion' => $regionData,
        //     'dataf' => $fonctionf,
        // ]);
        $query = $request->input('query');
        if($query != ''){
            $datausers = User::where('nom','like', '%' .$query. '%')
                           ->orWhere('prenom','like', '%' .$query. '%')
                           ->paginate(5)
                           ->setpath();
                           $datausers->appends(array(
                            'query' => $request->input('query'),
                        ));
                        if(count($datausers)>0){
                            return view('Admin/utilisateur',compact("datausers"));
                        }
                        return view('Admin/utilisateur')->with("message", "aucun résultat trouvé !");            
        }
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
            return redirect()->route('admin.recomponse')->with('success','Récomponse créé avec succès');
        }
        else{
            return back()->with('fail','Sommething wrong try again');
        }
    }
    public function recomponseSupp(string $id)
    {
        $recomponse = Recomponse::findOrFail($id);
        $recomponse->delete();
        return redirect()->route('admin.recomponse')->with('succe','Utlisateur Supprimer avec succès');
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


    public function edute(){
        $etude = Etude::orderBy('point','DESC')->paginate(3);
        $etudes = Etude::all();
        return view('Admin/Edute',[
            'etude' => $etude,
            'etudes'=> $etudes,
        ]);
    }
    public function createEdute(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
            'description' => 'required',
            'durré' => 'required',
            'point' => 'required',
        ]);
        $etude = Etude::create([
            'libelle' => $request->libelle,
            'description' => $request->description,
            'durré' => $request->durré,
            'point' => $request->point,
        ]);
        if($etude){
            return redirect()->route('admin.edute')->with('success','Etude créé avec succès');
        }
        else{
            return back()->with('fail','Sommething wrong try again');
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
        ]);

            $etude = Etude::where('id',$id)->first();
            $etude->libelle = $request->libelle;      
            $etude->description = $request->description;
            $etude->durré = $request->durré;
            $etude->point = $request->point;
            $etude->save();
            return redirect()->route('admin.edute')->with('succe','Etude Modifier avec succès');


    }

    public function eduteCible()
    {
        $etude = Etude::all();
        return view('Admin/CiblesEtude',[
            'etude' => $etude,
        ]);
    }
}
