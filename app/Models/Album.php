<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    public function post(){
        return $this->hasOne(Post::class)->latestOfMany();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
