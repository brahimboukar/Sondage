<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etude_region extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_etude',
        'id_region',
    ];
}
