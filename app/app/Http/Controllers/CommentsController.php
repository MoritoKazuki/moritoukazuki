<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\User;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request,$id)
   {
    
       $comment = new Comment();

       $comment->text = $request->comment;
       $comment->post_id = $id;
       $comment->user_id = Auth::user()->id;
       $comment->save();

       $comments=Comment::where('post_id',$id)->get();

       $item = Post::find($id);

        $item ->with('category')->first();

       return view('posts/post_detail',[
        'comments'=>$comments,
        'items'=>$item,
       ]);
   }

    public function commentDelete(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        return redirect('/');
    }
}
