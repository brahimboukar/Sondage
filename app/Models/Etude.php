<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etude extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'id_categorie',
        'libelle',
        'description',
        'lien',
        'durré',
        'point',
    ];

    public function categorie_etude(){
        
        return $this->belongsTo(Categorie_Etudes::class, 'id_categorie');
    }

    public function sexes()
    {
        return $this->belongsToMany(Sexe::class, 'etude_sexes');
    }

    public function regions()
    {
        return $this->belongsToMany(Region::class, 'etude_regions');
    }
    public function ages()
    {
        return $this->belongsToMany(Age::class, 'etude_ages' , 'etude_id', 'age_id');
    }

    public function fonctions()
    {
        return $this->belongsToMany(Fonction::class, 'etude_fonctions');
    }
    public function fonctionDetailes()
    {
        return $this->belongsToMany(FonctionDetaile::class, 'etude_fonction_detailes');
    }

    
}
