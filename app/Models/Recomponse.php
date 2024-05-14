<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
