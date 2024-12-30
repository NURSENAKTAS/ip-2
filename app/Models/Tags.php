<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public $timestamps = false;
    public function Discussions()
    {
        return $this->belongsToMany(Discussions::class,'discussion_tags');
    }
}

