<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande_recomponses extends Model
{
    use HasFactory;

    protected $fillable = [
        'recomponse_id',
        'user_id',
        'etat',
        'date',
        'created_at',
    ];

    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function recomponse()
    {
        return $this->belongsTo(Recomponse::class);
    }
}
