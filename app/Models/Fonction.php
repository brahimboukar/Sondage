<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
    ];


    public function etudes()
    {
        return $this->belongsToMany(Etude::class, 'etude_fonctions');
    }
}
