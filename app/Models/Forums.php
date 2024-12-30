<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forums extends Model
{
    public $timestamps = false;
    protected $fillable = [
        "forum_name",
        "description"
    ];

    public function User()
    {
        return $this->belongToMany(User::class, 'user_forum');

    }
    public function Categories()
    {
        return $this->belongsToMany(Categories::class,'forum_categories');
    }

    public function Moderators()
    {
        return $this->belongsToMany(Moderators::class,'forum_moderators');
    }
    public function ForumSettings()
    {
        return $this->belongsTo(ForumSettings::class);
    }
    public function Uploads()
    {
        return $this->hasMany(Uploads::class);
    }
    public function UserActivityLogs()
    {
        return $this->hasMany(UserActivityLogs::class);
    }
    public function Roles()
    {
        return $this->belongsToMany(Roles::class,'role_forum');
    }
    public function Discussions()
    {
        return $this->hasmany(Discussions::class,'forum_id', 'id');
    }




}
