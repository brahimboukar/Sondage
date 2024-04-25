<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SexeRequest;
use App\Models\Sexe;
use Illuminate\Http\Request;

class SexeController extends Controller
{
    public function add(SexeRequest $request)
    {
        $request->validated();

        $sexeDate = [
            'libelle' => $request->libelle,
        ];

        $sexe = Sexe::create($sexeDate);
        return response([
            'message' => 'Sexe Created Successful',
            'data' => $sexe
        ],201);
    }
}
