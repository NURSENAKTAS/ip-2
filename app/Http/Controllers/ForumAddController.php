<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Discussions;
use App\Models\Forums;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ForumAddController extends Controller
{
    public function index()
    {
        $pages= Pages::all();
        $categories= Categories::all();
        return view('main.layout.forumadd', compact('pages','categories'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "forum_name" => "required",
            "category" => "required",
            "description" => "required",
            "discussion_title" => "required",
            "discussion_content" => "required",
        ]);
        $forum = [
            "forum_name" => $request->get("forum_name"),
            "description" => $request->get("description")
        ];
       // dd($forum);
        $forums = Forums::create($forum);
        $forum_id = $forums->id;
        $user_id = Auth::user()->id;
        $discussion_title = $request->get("discussion_title");
        $discussion_slug = $this->createSlug($discussion_title);
        $discussionData = [
            "title" => $request->get("discussion_title"),
            "slug" => $discussion_slug,
            "user_id" => $user_id,
            "forum_id" => $forum_id,
            "content" => $request->get("discussion_content")
        ];

        Discussions::create($discussionData);
        $category_id = $request->get("category");
        $forum_categories =[
            "forum_id" => $forum_id,
            "category_id" => $category_id
        ];
        DB::table('forum_categories')->insert($forum_categories);
        $pages= Pages::all();
        $categories= Categories::all();
        return view ("main.layout.forumadd",compact("pages","categories"));
        //dd($discussion_slug);

       // dd($forum_id->id);

    }

    function createSlug($string)
    {
        // Özel karakterleri boşluklarla değiştir
        $string = preg_replace('/[^a-zA-Z0-9\s]/', '', $string);
        // Boşlukları tireye dönüştür
        $string = preg_replace('/\s+/', '-', $string);
        // Küçük harfe çevir ve baştaki/sondaki tireleri kaldır
        return strtolower(trim($string, '-'));
    }



}
