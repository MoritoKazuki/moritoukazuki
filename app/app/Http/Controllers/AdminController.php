<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;

class AdminController extends Controller
{
     public function index(){
        return view('admin'
           );
    }

    public function adminUser(){
      
      $user = User::all();;

      $user = User::withCount('posts')->get();
      

        return view('admin_user',['users' => $user,]);
    }

    public function adminPost(){

      $post = Post::all();;

      return view('admin_post',['posts' => $post,]);
    }

    public function user_pageData($id) {
            
      $user = User::find($id);

      return view('my_page', [
          'user' => $user,
      ]);
  }

  public function user_pageDelete($id) {
            
   $user = User::find($id)->forceDelete();
   
   return view('admin');
}

public function user_postDelete($id)
    {
        $item = Post::find($id)->forceDelete();

        return redirect('admin');
    }
 
}

