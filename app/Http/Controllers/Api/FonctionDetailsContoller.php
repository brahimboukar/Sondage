<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoctionDetails;
use App\Models\FonctionDetaile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FonctionDetailsContoller extends Controller
{
    public function add (FoctionDetails $request)
    {
        $request->validated();

        $fonctionDetailsData = [
            'libelle' => $request->libelle,
            'fonction_id' => $request->fonction_id,
        ];

        $fonctionDetails = FonctionDetaile::create($fonctionDetailsData);

        return response([
            'msg' => 'fonctionDetails Create Succefully',
            'data' => $fonctionDetails
        ],201);
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
}
