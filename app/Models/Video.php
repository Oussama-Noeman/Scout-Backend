<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'videos';
    protected $fillable = [
        'playlist_id',
        'title',
        'slug',
        'caption',
        'image',
        'related_tags',
        'status',
        'view_status'
    ];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class,'playlist_id','id');
    }
}
