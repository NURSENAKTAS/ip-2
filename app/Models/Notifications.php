<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
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
    public function Roles()
    {
        return $this->belongsTo(Roles::class);
    }
}
