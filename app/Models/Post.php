<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelLike\Traits\Likeable;

class Post extends Model
{
    use HasFactory;
    use Likeable;

    protected  $guarded = [];

    protected $casts = [
        "hide_like" => "boolean",
        "allow_commenting" => "boolean",

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class , "mediable");
    }

    function comments()
    {
        return $this->morphMany(Comment::class , "commentable")->with("replies");
    }


}
