<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FonctionRequest;
use App\Models\Fonction;
use Illuminate\Http\Request;

class FonctionController extends Controller
{
    public function add (FonctionRequest $request)
    {
        $request->validated();

        $fonctionData = [
            'libelle' => $request->libelle,
        ];
        $fonction = Fonction::create($fonctionData);

        return response([
            'msg' => 'Fonction create Succesfully',
            'data' => $fonction
        ],201);
    }
}
