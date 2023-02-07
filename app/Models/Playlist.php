<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'playlist';
    protected $fillable = [
        'title',
        'slug',
        'image',
        'status'
    ];
    public function videos()
    {
        return $this->hasMany(Video::class,'playlist_id','id');
    }
}
