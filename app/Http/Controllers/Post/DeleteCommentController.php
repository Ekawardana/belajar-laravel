<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class DeleteCommentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Post $post, Comment $comment)
    {

        $this->authorize('delete', $comment);

        $comment->delete();

        session()->flash('success', 'Comment Terhapus!');

        return redirect()->back();
    }
}
