<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class CommentSystem extends Controller
{
    public function SaveComment(CommentRequest $request, $id)
    {
        $comment = new Comments();
        $comment->post_id = $request->post_id;
        $comment->username = $request->username;
        $comment->message = $request->message;
        $comment->save();
        return response()->json(['code' => 200, 'data' => $comment], 200);
    }
}
