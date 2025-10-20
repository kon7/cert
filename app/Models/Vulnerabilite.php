<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vulnerabilite extends Model
{
    protected $fillable = [
        'feed_source_id',
        'cve_id',
        'title',
        'description',
        'source',
        'link',
        'published_at',
    ];

     protected $casts = [
        'published_at' => 'datetime',
    ];

     public function feedSource()
    {
        return $this->belongsTo(FeedSource::class, 'feed_source_id');
    }
}
