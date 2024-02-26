<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'judul',
        'image',
        'description',
        'user_id',
        'album_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);       
    }
    public function album() {
        return $this->belongsTo(Album::class);       
    }
}
