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
        'created_by',
        'updated_by',
        'deleted_by',
        'is_active',
        'two_factor_code',
        'two_factor_expires_at',
       
    ];
    protected $hidden = [
       
        'remember_token',
        'two_factor_code',
    ];
     protected $casts = [
        'two_factor_expires_at' => 'datetime',
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
    public function deactivate()
    {
        $this->is_active = false;
        $this->save();
    }

    public function activate()
    {
        $this->is_active = true;
        $this->save();
    }
        public function generateTwoFactorCode()
    {
        $this->two_factor_code = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(10); // code valide 10 min
        $this->save();
    }

    public function resetTwoFactorCode()
    {
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }

}
