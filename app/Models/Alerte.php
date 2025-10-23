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
}
