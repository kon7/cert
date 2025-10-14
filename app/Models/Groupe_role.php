<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Groupe_role extends Model
{
      use HasFactory;

    

    protected $fillable = [
        'groupe_id',
        'role_id',
    ];

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
