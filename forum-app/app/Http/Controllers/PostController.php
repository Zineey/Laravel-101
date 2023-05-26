<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function form()
    {
        return view('post.form');
    }

    public function post($id = Null)
    {
        if (isset($id)) {
            $record = Post::findorFail($id);
            $record->with('replies');
            // Redirect back to route with id using the session this is connected to ReplyController@updateReply
            Session::put('reply', request()->fullUrl());
            return view('post.replies', ['data' => $record]);
        } else {
            $data = Post::with('user')->orderBy('created_at', 'Desc')->get();
            return view('post.post', ['data' => $data]);
        }
    }

    public function addTopic(Request $request)
    {
        $posts = new Post;

        $posts->create($request->all());
        return redirect('/posts');
    }

    public function updatePost(Request $request, $id)
    {
        $posts = Post::where('user_id', '=', Auth::id())->findorFail($id);
        $posts->post_subject = $request->input('post_subject');
        $posts->post_desc = $request->input('post_desc');
        $posts->update();
        return redirect('/posts');
    }

    public function updatePostForm($id)
    {
        $record = Post::findOrFail($id);
        return view('post.updatePost', ['data' => $record]);
    }

    public function deletePost($id)
    {
        $posts = new Post;
        if (session('reply')) {
            return redirect(session('reply'));
        }
        $posts::where('user_id', '=', Auth::id())->findorFail($id)->delete();
        return redirect('/posts');
    }
}
