<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
    ];


    public function etudes()
    {
        return $this->belongsToMany(Etude::class, 'etude_regions');
    }
}
