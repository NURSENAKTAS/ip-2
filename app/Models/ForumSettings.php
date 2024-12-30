<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumSettings extends Model
{
    public $timestamps = false;
    public function Forums()
    {
        return $this->belongsTo(Forums::class);
    }
}
