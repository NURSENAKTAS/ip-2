<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'role_name',
    ];
    public function User()
    {
        return $this->belongsToMany(User::class,'user_role_assigment');
    }
    public function Categories()
    {
        return $this->belongsToMany(Categories::class,'role_categories_assignments');
    }
    public function Notifications()
    {
        return $this->hasMany(Notifications::class);
    }
    public function Forums()
    {
        return $this->belongsToMany(Forums::class,'role_forum');
    }
}
