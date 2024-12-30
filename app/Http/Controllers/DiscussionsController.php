<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Comments;
use App\Models\Discussions;
use App\Models\Pages;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionsController extends Controller
{
    public function index($id)
    {

        $discussions = Discussions::find($id);
        $user = \App\Models\User::find($discussions->user_id);
        $user_name = $user->user_name;
        $comments = $discussions->comments;
        $pages = Pages::all();
        $categories= Categories::all();
        return view("main.layout.discussions",compact("pages","categories","discussions","user_name","comments"));

    }
        public function store(Request $request, $id)
        {

            $validatedData = $request->validate
            ([
                "comment_text" => "required"
            ]);
            $user_id = Auth::user()->id;
            $discussion_id = $id;
            $discussion = [
                "user_id" => $user_id,
                "discussion_id" => $discussion_id,
                "comment_text" => $request->get("comment_text")
            ];
            $comments = Comments::create($discussion);

            return redirect("/discussion/$id");
        }
}
