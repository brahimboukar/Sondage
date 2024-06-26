<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Recomponse extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'id_categorie',
        'points',
        'status',
        'img'
    ];

    public function categorie_recomponse(){
        return $this->hasMany('App\Models\Categorie_recomponse','id','id_categorie');
    }

    protected $dates = ['created_at', 'updated_at'];

    public function demandesRecomponses()
    {
        return $this->hasMany(Demande_recomponses::class,'recomponse_id');
    }

    public function scopeMostDemanded($query)
{
    return $query->join('demande_recomponses', 'recomponses.id', '=', 'demande_recomponses.recomponse_id')
                 ->select('recomponses.*', DB::raw('COUNT(demande_recomponses.id) as demande_recomponses_count'))
                 ->groupBy('recomponses.id')
                 ->orderBy('demande_recomponses_count', 'desc');
}
    
   
}
