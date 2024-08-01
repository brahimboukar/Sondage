<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evenements extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'libelle',
        'description',
        'date_Debut',
        'date_Fin',
        'lien'
    ];

    public function utilisateurs()
    {
        return $this->belongsToMany(User::class, 'evenement_users', 'evenement_id', 'user_id')->withPivot('date');
    }
}
