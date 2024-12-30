<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discussions extends Model
{
    public $timestamps = false;
    protected  $fillable = [
        "title",
        "slug",
        "content",
        "user_id",
        "forum_id"
    ];

    public function User()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function Forums()
    {
        return $this->belongsTo(Forums::class);
    }
    public function Tags()
    {
        return $this->belongsToMany(Tags::class,'discussion_tags');
    }
    public function Moderators()
    {
        return $this->belongsToMany(Moderators::class,'discussion_moderators');
    }
    public function Likes()
    {
        return $this->hasMany(Likes::class);
    }
    public function Reports()
    {
        return $this->hasMany(Reports::class);
    }
    public function Notifications()
    {
        return $this->hasMany(Notifications::class);
    }
    public function Comments()
    {
        return $this->hasMany(Comments::class,'discussion_id', 'id');
    }
    public function Uploads()
    {
        return $this->hasMany(Uploads::class);
    }
}
