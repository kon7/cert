<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeedSource extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'type',
        'active',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
     public function vulnerabilities()
    {
        return $this->hasMany(Vulnerabilite::class, 'feed_source_id');
    }

}
