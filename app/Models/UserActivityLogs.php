<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivityLogs extends Model
{
    public $timestamps = false;
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function UserActivityLogs()
    {
        return $this->belongsTo(UserActivityLogs::class);
    }
}
