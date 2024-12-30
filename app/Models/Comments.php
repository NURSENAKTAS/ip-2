<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public $timestamps = false;
    protected $fillable = [
        "user_id",
        "discussion_id",
        "comment_text"
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Discussions()
    {
        return $this->belongsTo(Discussions::class);
    }
    public function Likes()
    {
        return $this->hasMany(Likes::class,'discussion_id', 'id');
    }
    public function Reports()
    {
        return $this->hasMany(Reports::class);
    }


}

