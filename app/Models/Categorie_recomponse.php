<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie_recomponse extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
    ];

    public function recompenses()
    {
        return $this->hasMany(Recomponse::class, 'id_categorie');
    }
}
