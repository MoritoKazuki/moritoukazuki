<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Post;


class DisplayController extends Controller
{
    public function accountData() {
        $id = Auth::id();
        $user = User::all()->find($id);
        

        return view('accounts/account',[
            'user' => $user,
        ]);
    }

    public function accountEditForm() {
        $id = Auth::id();
        $user = User::all()->find($id);

        return view('accounts/account_edit',[
            'user' => $user,
        ]);
    }

    public function accountEdit(Request $request) {
        $user = new User;

        $id = Auth::id();
        $record = $user->find($id);

        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('',$image,'public');

        $record->name = $request->name;
        $record->profile = $request->profile;
        $record->image = $image;

        $record->save();

        return redirect()->route('my_page.data');
    }

    public function accountDelete() {
        $id = Auth::id();
        $item = User::find($id)->forceDelete();

        return redirect('/register');
    }
    
    public function like($id) {
        $items = Post::join('likes','posts.id','post_id')->where('likes.user_id',$id)->get();

        
        return view('like',compact('items'));
    }
}
