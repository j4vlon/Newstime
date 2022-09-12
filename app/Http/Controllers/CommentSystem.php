<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comments;
use Symfony\Component\Console\Input\Input;

class CommentSystem extends Controller
{
    public function SaveComment(CommentRequest $request, $id)
    {
        $comment = new Comments();
        $comment->post_id = $id;
        $comment->title = $request->input('title');
        $comment->message = $request->input('message');
        $comment->save();
        return redirect()->back()->with('success', 'Ваша заявка принята!');
    }
}
