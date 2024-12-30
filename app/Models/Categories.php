<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $timestamps = false;

    public function Forums()
    {
       return $this->belongsToMany(Forums::class,"forum_categories");

    }
    public function Roles()
    {
        return $this->belongsToMany(Roles::class,"role_categories_assignments");
    }

}

