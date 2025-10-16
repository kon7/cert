<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = ['libelle', 'description'];

    

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'groupe_roles');
    }
    public function utilisateurs()
    {
        return $this->belongsToMany(Utilisateur::class, 'utilisateur_groupes');
    }
}
