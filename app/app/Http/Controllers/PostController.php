<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use App\Http\Requests\updatepost;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Category;
use App\Post;
use App\User;
use App\Comment;
use App\Like;

class PostController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $items = Post::with('user')->get();

        $like_model = new Like;
        
       

        return view('home',[
            'items' => $items,
            'like_model'=>$like_model,
        ]);
    }

    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $post_id = $request->post_id;
        $like = new Like;
        

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $post_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('post_id', $post_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->post_id = $request->post_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = Category::get();
        // dd($params);

        return view('posts/new_post',[
            'categories' => $params,
        ]);    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateData $request)
    {
        
        $post = new Post;
        
        // 画像フォームでリクエストした画像を取得
        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('',$image,'public');
        
           // storage > public > img配下に画像が保存される
        // $path = $img->store('img','public');
        $post->title = $request->title;
        $post->pet = $request->pet;
        $post->date = $request->date;
        $post->category_id = $request->category_id;
        $post->image = $image;
        $post->episode = $request->episode;


        Auth::user()->posts()->save($post);
        return redirect('/my_page');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $id = Auth::id();
        $item = Post::find($id);
        

        $item ->with('category') ->where('id',$item)->first();
        $comments=Comment::where('post_id',$id)->get();


        return view('posts/post_detail',compact('item'),['items' => $item,'comments' => $comments,]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $params = Category::get();

        return view('posts/post_edit',[
            'post' => $post,
            'categories' => $params,
        ]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updatepost $request, $id)
    // CreateData
    {
        $post = new Post;
        $record = $post->find($id);
        // dd($request);
        
        if(null !==$request->file('image')){
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('',$image,'public');
        }

        $record->title = $request->title;
        $record->date = $request->date;
        $record->pet = $request->pet;
        $record->category_id = $request->category_id;
        if(null !==$request->file('image')){
            $record->image = $image;
        }
        $record->episode = $request->episode;

        Auth::user()->posts()->save($record);

        return redirect('/my_page');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Post::find($id)->forceDelete();

        return redirect('/my_page');
    }

    // 検索
    public function search(Request $request){
        $search = $request->input('search');

        // 全角スペースを半角に変換
        $spaceConversion = mb_convert_kana($search, 's');
        
        // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
        $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

        // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
        $keyword = [];
        $query = Post::query()->whereHas('category', function ($query) use ($wordArraySearched) {
            $query->whereIn('category',$wordArraySearched)
                  ->orWhereIn('posts.title',$wordArraySearched);
            
        })->get();


      

    
        $items = $query;
        $like_model = new Like;
        

        return view('home',[
                'items' => $items,
                'like_model' => $like_model,
            ]);
    }
    
        public function my_pageData() {
            
            $user = Auth::user();
            
    
            return view('my_page', [
                'user' => $user,
            ]);
        }

        public function postList() {
            $items = Post::where('user_id',Auth::id())->get();
            // return view('item.index', compact('items'));
    
            // dd($items);
            return view('posts/post_list',[
                'items' => $items,
            ]);
        }

        public function otherData($id) {
            
            $user = User::find($id);
      
            return view('my_page', [
                'user' => $user,
            ]);

        }
      
        public function users_postList($id) {
            
            $items = Post::where('user_id',$id)->get();
            // return view('item.index', compact('items'));
    
            // dd($items);
            return view('posts/post_list',[
                'items' => $items,
            ]);
        }
}

