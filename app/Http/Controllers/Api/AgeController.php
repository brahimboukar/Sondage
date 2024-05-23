<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgeRequest;
use App\Models\Age;
use Illuminate\Http\Request;

class AgeController extends Controller
{
    public function add(AgeRequest $request)
    {
        $request->validated();

        $ageData = [
            'libelle' => $request->libelle,
        ];

        $age = Age::create($ageData);
        return response([
            'message' => 'Age Created Successful',
            'data' => $age
        ],201);
    }
}
