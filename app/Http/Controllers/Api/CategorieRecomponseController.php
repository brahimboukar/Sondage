<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategorieRecomponseRequest;
use App\Models\Categorie_recomponse;
use Illuminate\Http\Request;

class CategorieRecomponseController extends Controller
{
    public function add(CategorieRecomponseRequest $request)
    {
        $request->validated();

        $categorieData = [
            'libelle' => $request->libelle,
        ];
        $categorie = Categorie_recomponse::create($categorieData);

        return response([
            'msg' => 'Categorie Recompons create Succesfully',
            'data' => $categorie
        ],201);
    }
    public function list()
    {
        $categories = Categorie_recomponse::all();
        return response()->json([
            'msg' => 'list Des Categories',
            'data' => $categories,
        ]);
    }
}
