<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie_Etudes extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
    ];

    public function etudes()
{
    return $this->hasMany(Etude::class, 'id_categorie');
}
}
