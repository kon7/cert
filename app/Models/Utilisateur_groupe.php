<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur_groupe extends Model
{
    protected $fillable = [
        'groupe_id',
        'utilisateur_id',
    ];

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
