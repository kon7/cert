<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
     use HasFactory;

    protected $fillable = ['libelle', 'description'];

    public function groupes()
    {
        return $this->belongsToMany(Groupe::class, 'groupe_roles');
    }
}
