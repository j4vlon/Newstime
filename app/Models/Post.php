<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function likes()
    {
        return $this->hasMany('App\Models\LikeSystem', 'post_id')->sum('likes');
    }

    public function dislikes()
    {
        return $this->hasMany('App\Models\LikeSystem', 'post_id')->sum('dislikes');
    }
}
