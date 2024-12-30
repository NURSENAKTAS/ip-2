<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Forums;
use App\Models\Pages;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $pages =Pages::all();
        $categories = Categories::all();
        $forums = Forums::limit(5)->get();
        return view("main.index",compact("pages","categories","forums"));
    }
}
