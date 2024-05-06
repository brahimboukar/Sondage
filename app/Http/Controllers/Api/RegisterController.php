<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $validator = $request->validate([
            'email' => 'unique:users,email',
        ]);
        if (!$validator) {
            return response([
                'msg' => 'Email déja Exsist'
            ]);
        }
        $request->validated();

        $userData = [
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
        ];
        $user = User::create($userData);
        $token = $user->createToken('sondageapp')->plainTextToken;

        if($user){
            return response([
                'msg' => 'Votre Compte créé avec succès',
                'data' => $user,
                'token' => $token
            ],201);
        }
        else{
            return response([
                'msg' => 'Error !!',
            ],500);
        }


    }
}
