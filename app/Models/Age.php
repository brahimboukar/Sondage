<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'age_Min',
        'age_Max'
    ];

    public function etudes()
    {
        return $this->belongsToMany(Etude::class, 'etude_ages');
    }

    
}