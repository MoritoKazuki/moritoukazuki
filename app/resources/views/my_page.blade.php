@extends('layouts.app')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="card rounded">
                @if($user['image']!==null)
                <img src="{{ asset('storage/'.$user['image']) }}" style="width: 100%; height: 500px;  object-fit:cover; opacity: 0.7;">
                @else
                <img src="{{ asset('noimage.png') }}" style="width: 100%; height: 500px;  object-fit:cover; opacity: 0.7;">
                @endif
              <div class="card-img-overlay my-5">
                <div class="my-5 text-center" style="height: 80px; background:#DDDDDD;">
                    <p style="background:#CCCCCC;">ユーザー名</p>
                    <p>{{$user['name']}}</p>
                </div>
                <div class="my-5 text-center" style="height: 80px; background:#DDDDDD;">
                    <p style="background:#CCCCCC;">一言コメント</p>
                    <p>{{$user['profile']}}</p>
                </div>
              </div>


              
            </div>
            
            <div class="border border-success" style="background:#EEEEEE; height:150px; margin-top: 30; padding-top: 50;">
             <div class="d-flex justify-content-around w-100">
                @if($user['id'] == Auth::id())
                    <a href="{{ route('posts.create') }}">
                        <button type="button" class="btn btn-outline-success">新規登録</button>
                    </a>
                    <a href="{{ route('account.data') }}">
                        <button type="button" class="btn btn-outline-success">アカウント情報</button>
                    </a>
                    <a href="{{ route('like', $user->id) }}">
                        <button type="button" class="btn btn-outline-success">いいね欄</button>
                    </a>
                    <a href="{{ route('post.list') }}">
                        <button type="button" class="btn btn-outline-success">投稿一覧</button>
                    </a>
                @else
                    <a href="{{ route('users_post.list',$user['id']) }}">
                        <button type="button" class="btn btn-outline-success">投稿一覧</button>
                    </a>
                @endif
                  <button class='btn btn-secondary' onclick="history.back()">戻る</button>
             </div>
            </div>
        </div>
        </main>
</div>
@endsection
<style>
</style>
