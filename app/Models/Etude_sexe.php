<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etude_sexe extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_etude',
        'id_sexe',
    ];
}
