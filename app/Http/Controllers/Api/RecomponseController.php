<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recomponse;
use Illuminate\Http\Request;

class RecomponseController extends Controller
{
    public function list(Request $request)
    {
        $query = Recomponse::query();

        
        if ($request->has('category_id') && $request->category_id !== null) {
            $query->where('id_categorie', $request->category_id);
        }

        $recompenses = $query->get();

        return response()->json([
            'data' => $recompenses
        ]);
    }
}

