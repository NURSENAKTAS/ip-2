<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Comments;
use App\Models\Discussions;
use App\Models\Forums;
use App\Models\Pages;
use App\Models\User;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $pages = Pages::all();

        $forums = Forums::with(['discussions.comments', 'discussions.user'])
            ->whereHas("discussions")
            ->get();
        //dd($forums);
        return view('main.forum', compact('forums', 'pages'));
        //veri çekeceksek index
        //veri ekleyeceksek store
        //veri güncelleyeceksek update
        //
    }
}
