<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexe extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }

    public function etudes()
    {
        return $this->belongsToMany(Etude::class, 'etude_sexes');
    }
}
