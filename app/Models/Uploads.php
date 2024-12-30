<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uploads extends Model
{
    public $timestamps = false;
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Forums()
    {
        return $this->belongsTo(Forums::class);
    }
    public function Discussions()
    {
        return $this->belongsTo(Discussions::class);
    }
}
