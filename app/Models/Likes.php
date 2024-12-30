<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    public $timestamps = false;
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Discussions()
    {
        return $this->belongsTo(Discussions::class);
    }
    public function Comments()
    {
        return $this->belongsTo(Comments::class);
    }
}
