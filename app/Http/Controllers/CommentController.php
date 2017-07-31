<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Technology;
use App\Company;
use App\City;
use App\Region;
use App\Country;
use App\Contact;
use App\Comment;
use App\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function sendComment(Request $request)
    {

        $userId = $request->input('user_id');
        $title = htmlspecialchars($request->input('comment-title'));
        $text = htmlspecialchars($request->input('comment-text'));

        $comment = new Comment;

        $comment->user_id = $userId;
        $comment->title = $title;
        $comment->text = $text;
        $comment->save();

        return redirect()->route('profile', [$userId]);


    }
}
