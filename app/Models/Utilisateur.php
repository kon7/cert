<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Utilisateur extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'email',
        'password',
       
    ];
    protected $hidden = [
       
        'remember_token',
    ];

    public function groupes()
    {
        return $this->belongsToMany(Groupe::class, 'utilisateur_groupes');
    }

    //fonction pour les roles
    public function hasRole(string $roleLibelle): bool
    {
        foreach ($this->groupes as $groupe) {
            if ($groupe->roles->contains('libelle', $roleLibelle)) {
                return true;
            }
        }
        return false;
    }
}
