<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Category;
use App\Post;

class PhotoController extends Controller
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
    public function index()
    {
        return view('home');
    }

    public function my_pageData() {

        $id = Auth::id();
        $account = DB::table('users')->find($id);

        return view('my_page', ['$account' => $account]);
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
    public function store(Request $request)
    {
        $post = new Post;
        
        // 画像フォームでリクエストした画像を取得
        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('',$image,'public');
        // dd($request->file('image'));
           // storage > public > img配下に画像が保存される
        // $path = $img->store('img','public');
        $post->title = $request->title;
        $post->pet = $request->pet;
        $post->date = $request->date;
        $post->category_id = $request->category_id;
        $post->image = $image;
        $post->episode = $request->episode;


        Auth::user()->post()->save($post);
        return redirect('/my_page');
    }

    public function postList() {
        $items = Post::all();
        // return view('item.index', compact('items'));

        // dd($items);
        return view('posts/post_list',[
            'items' => $items,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Post::find($id);

        $item ->with('category') ->where('id',$item)->first();

        return view('posts/post_detail',compact('item'),['items' => $item,]);
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
    public function update(Request $request, $id)
    {
        $post = new Post;
        $record = $post->find($id);
        // dd($request);

        $record->title = $request->title;
        $record->date = $request->date;
        $record->pet = $request->pet;
        $record->category_id = $request->category_id;
        $record->image = $request->image;
        $record->episode = $request->episode;

        Auth::user()->post()->save($record);

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
        //
    }
}
