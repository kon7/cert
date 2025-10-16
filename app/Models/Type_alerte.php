<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type_alerte extends Model
{
    use SoftDeletes;

    protected $table = 'type_alertes';

    protected $fillable = [
        'libelle',
        'description',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
