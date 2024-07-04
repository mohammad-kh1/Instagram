<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected  $guarded =[];

    function commentable(){
        return $this->morphTo();
    }

    #parent
    function parent()
    {
        return $this->belongsTo(Self::class ,"parent_id");

    }

    function replies()
    {
        return $this->hasMany(Comment::class , "parent_id" , "id")->with("replies");
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

}
