<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comments;

class ArticlesController extends Controller
{
    public function ViewPosts()
    {
        $news = Post::all();
        return view('articles.articles', compact('news'));
    }

    public function ViewPost($id)
    {
        $post = Post::find($id);
        $comments = Comments::where('post_id', $id)->orderBy('id')->get();
        return view('articles.article', compact('post', 'comments'));
    }
}
