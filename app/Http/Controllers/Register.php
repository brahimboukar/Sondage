<?php

namespace App\Http\Controllers;

use App\Models\Fonction;
use App\Models\FonctionDetaile;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Register extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function register()
    {
        
        $regionData = Region::all();
        $fonctionf = Fonction::all();
        
        
        return view("Auth/register", [
            'data' => $regionData,
            'dataf' => $fonctionf
        ]);
    }

    public function findFonctionDetails(Request $request)
    {
        $data = FonctionDetaile::select('libelle','id')->where('fonction_id',$request->id)->take(100)->get();
        return response()->json($data);
    }

    public function registerSave(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users,email',
            'telephone' => 'required',
            'age' => 'required',
            'dateNaissance' => 'required',
            'id_sexe' => 'required',
            'id_region' => 'required',
            'id_fonction' => 'required',
            'id_fonction_details' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('register')->with('faile','Email que vous allez saissir existe déjà');
        }



        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'age' => $request->age,
            'dateNaissance' => $request->dateNaissance,
            'telephone' => $request->telephone,
            'id_sexe' => $request->id_sexe,
            'id_region' => $request->id_region,
            'id_fonction' => $request->id_fonction,
            'id_fonction_details' => $request->id_fonction_details,
            'password' => Hash::make($request->password),
            'type' => "0"
        ]);
        if($user){
            return redirect()->route('login')->with('success','Votre Compte créé avec succès');
        }
        else{
            return back()->with('fail','Sommething wrong try again');
        }
    }
}
