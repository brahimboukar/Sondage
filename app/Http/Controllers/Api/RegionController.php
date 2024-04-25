<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegionRequest;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function add(RegionRequest $request)
    {
        $request->validated();

        $regionData = [
            'libelle' => $request->libelle,
        ];

        $region = Region::create($regionData);
        return response([
            'message' => 'region Created Successful',
            'data' => $region
        ],201);
    }
}
