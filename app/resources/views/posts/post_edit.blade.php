@extends('layouts.app')

@section('content')
<main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
            
                <div class="card-header">
                    <h4 class='text-center'>投稿編集
                    </h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        
                        <form action="{{ route('posts.update',['post'=>$post->id]) }}" method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <label for='title'>タイトル</label>
                                <input type='text' class='form-control' name='title' value="{{ $post['title']}}"/>
                            <label for='pet'>ペットのお名前</label>
                                <input type='text' class='form-control' name='pet' value="{{ $post['pet']}}"/>
                            <label for='date' class='mt-2'>日付</label>
                                <input type='date' class='form-control' name='date' id='date' value="{{ $post['date']}}"/>
                            <label for='category' class='mt-2'>種類</label>
                            <select name='category_id' class='form-control'>
                                @foreach($categories as $category)
                                 @if($post['category_id'] == $category['id'])
                                  <option value="{{ $category['id']}}" selected>{{ $category['category'] }}</option>
                                  @else
                                  <option value="{{ $category['id']}}">{{ $category['category'] }}</option>
                                 @endif
                                @endforeach
                            </select>
                            </br>
                            <p>画像
                            </br>
                            <img src="{{ asset('storage/'.$post['image']) }}" width='150' height='200'>
                            <input type="file" name="image" value="{{ $post['image']}}">
                            </p>
                            </br>
                            <label for='episode' class='mt-2'>コメント</label>
                                <textarea class='form-control' name='episode'>{{ $post['episode']}}</textarea>
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
