<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reply;
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

        $comment = new Comment;

        $comment->user_id = $request->input('user_id');
        $comment->page_id = $request->input('page_id');
        $comment->text = htmlspecialchars($request->input('comment-text'));
        $comment->save();

        return redirect()->route('profile', [$comment->user_id]);
    }

    public function sendReply(Request $request)
    {
        $user = new User;
        $replies = new Reply;
        $comment = new Comment;

        $replies->user_id = $request->input('user-reply-id');
        $replies->comment_id = $request->input('comment_id');
        $replies->page_id = $request->input('page_id');
        $replies->text = htmlspecialchars($request->input('comment-text'));
        $replies->save();

        return redirect()->route('profile', [$replies->user_id]);
    }
}
