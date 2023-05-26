<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function addReply(Request $request)
    {
        $reply = new Reply;
        $reply->create($request->all());
        if (session('reply')) {
            return redirect(session('reply'));
        }
        return redirect('/posts');
    }

    public function updateReplyForm($id)
    {
        $data = Reply::where('user_id', '=', Auth::id())->findorFail($id);
        return view('post.updateReply', ['data' => $data]);
    }

    public function updateReply(Request $request, $id)
    {
        $data = Reply::where('user_id', '=', Auth::id())->findorFail($id);
        $data->reply_desc = $request->reply_desc;
        $data->save();
        if (session('reply')) {
            return redirect(session('reply'));
        }
        return redirect('/posts');
    }

    public function deleteReply($id)
    {
        $reply = new Reply;
        $reply::where('user_id', '=', Auth::id())->findorFail($id)->delete();
        if (session('reply')) {
            return redirect(session('reply'));
        }
        return redirect('/posts');
    }
}
