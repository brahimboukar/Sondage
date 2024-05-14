<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'age',
        'telephone',
        'id_sexe',
        'id_region',
        'id_fonction',
        'id_fonction_details',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["user", "admin"][$value],
        );
    }
    public function sexes(){
        return $this->hasMany('App\Models\Sexe','id','id_sexe');
    }
    public function regions(){
        return $this->hasMany('App\Models\Region','id','id_region');
    }
    public function fonctions(){
        return $this->hasMany('App\Models\Fonction','id','id_fonction');
    }
    public function fonctionsDetails(){
        return $this->hasMany('App\Models\FonctionDetaile','id','id_fonction_details');
    }
}
