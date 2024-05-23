<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FonctionDetaile extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'fonction_id'
    ];

    public function etudes()
    {
        return $this->belongsToMany(Etude::class, 'etude_fonction_detailes');
    }
}
