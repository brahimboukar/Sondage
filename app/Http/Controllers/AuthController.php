<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Fonction;
use App\Models\FonctionDetaile;
use App\Models\Region;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login()
    {
        return view('Auth/login');
    }

    public function loginAction(Request $request)
    {
        Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|min:5'
        ])->validate();

        if(!Auth::attempt($request->only('email','password'))){
            // throw ValidationException::withMessages([
            //     'email' => trans('auth.failed')
            // ]);
            return back()->with('fail','Email Ou Password Incorect');
        }
        $request->session()->regenerate();

        if(auth()->user()->blocked == true){
            return back()->with('fail','Votre Compte à été Bloquer');
        }
        
        if(auth()->user()->type == 'admin'){
            return redirect()->route('admin');
        }
        else{
            return redirect()->route('home');
        }


    }
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
        Validator::make($request->all(),[
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'age' => 'required',
            'telephone' => 'required',
            'id_sexe' => 'required',
            'id_region' => 'required',
            'id_fonction' => 'required',
            'id_fonction_details' => 'required',
            'password' => 'required',
        ])->validate();

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
            return redirect()->route('login')->with('success','Votre Compte créé avec succès');
        }
        else{
            return back()->with('fail','Sommething wrong try again');
        }
    }

    public function getfonctionDetails(Request $request)
    {
         $fon = $request->post('fon');
         //$fonD = DB::table('fonction_detailes')->where('fonction_id ',$fon)->orderBy('fonction_id','asc')->get();
         $data = FonctionDetaile::select()->where('fonction_id',$fon)->take(100)->get();
        //  $html = '<option selected disabled>
        //  --- Choissir votre fonction Details ---</option>';
        $html = '';
         foreach($data as $list){
            $html.= '<option value="'.$list->id.'">'.$list->libelle.'</option>';
         }
         echo $html;
    }


    public function getfonctionDetailscheck(Request $request)
    {
         $fon = $request->post('fon');
         //$fonD = DB::table('fonction_detailes')->where('fonction_id ',$fon)->orderBy('fonction_id','asc')->get();
         $data = FonctionDetaile::select()->where('fonction_id',$fon)->take(100)->get();
        //  $html = '<option selected disabled>
        //  --- Choissir votre fonction Details ---</option>';
        $html = '';
         foreach($data as $list){

            if($list->id == 1 || $list->id == 2){
                $html.= '<input class="form-check-input fcd" type="checkbox" value="{{'.$list->id.'}}">{{'.$list->libelle.'}}<br>';   
            }
            else{
                $html.= '<input class="form-check-input" type="checkbox" value="{{'.$list->id.'}}">{{'.$list->libelle.'}}<br>';   
            }
         }
         echo $html;
    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
 
        $request->session()->invalidate();
 
        return redirect('/login');
    }
}
