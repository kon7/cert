<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alerte extends Model
{
    use SoftDeletes;

    

    protected $fillable = [
        'reference',
        'intitule',
        'type_alerte_id',
        'date',
        'severite',
        'etat',
        'date_initial',
        'date_traite',
        'concerne',
        'risque',
        'systemes_affectes',
        'synthese',
        'solution',
        'source',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $dates = [
        'date',
        'date_initial',
        'date_traite',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function typeAlerte()
    {
        return $this->belongsTo(Type_alerte::class, 'type_alerte_id');
    }

    

     protected static function boot()
    {
        parent::boot();

        static::creating(function ($alerte) {
            if (!$alerte->reference) {
                $year = date('Y');
                $typeCode = strtoupper(substr($alerte->typeAlerte->libelle, 0, 3));

                // Récupère le dernier numéro pour ce type et cette année
                $lastAlerte = self::whereYear('created_at', $year)
                                  ->whereHas('typeAlerte', function($q) use ($alerte) {
                                      $q->where('id', $alerte->type_alerte_id);
                                  })
                                  ->orderBy('id', 'desc')
                                  ->first();

                $nextNumber = $lastAlerte ? ((int)explode('-', $lastAlerte->reference)[3] + 1) : 1;

                $alerte->reference = "CERTBFA-{$year}-{$typeCode}-{$nextNumber}";
            }
        });
    }
}
