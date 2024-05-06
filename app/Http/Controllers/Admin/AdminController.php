<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fonction;
use App\Models\Region;
use App\Models\Sexe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function adminDashboread(){
        return view('Admin/Dashboread');
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
    public function recomponse(){
        return view('Admin/Recomponse');
    }
    public function edute(){
        return view('Admin/Edute');
    }
}
