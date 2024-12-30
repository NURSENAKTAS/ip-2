<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    public $timestamps = false;



    protected $table = 'pages';
    protected $fillable = ["page_name"];

}
