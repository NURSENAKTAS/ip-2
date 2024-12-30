<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moderators extends Model
{
    public $timestamps = false;
    public function Forums()
    {
        return $this->belongsToMany(Forums::class,'forum_moderators');
    }
    public function Discussions()
    {
        return $this->belongsToMany(Discussions::class,'discussion_moderators');
    }
}
