@extends('layouts.app')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="card">
                @if($user['image']!==null)
                <img src="{{ asset('storage/'.$user['image']) }}" style="max-width: 1400px; max-height: 500px;">
                @else
                <img src="{{ asset('noimage.png') }}" style="max-width: 1400px; max-height: 500px;">
                @endif
              <div class="card-img-overlay text-white">
                <p class="bg-dark">
                    <th scope='col'>ユーザー名</th><th scope='col'>{{$user['name']}}</th>
                </p>
                <p class="bg-dark">
                    <th scope='col'>一言コメント</th><th scope='col'>{{$user['profile']}}</th>
                </p>
              </div>
            </div>
            
            <div class="row">
            @if($user['id'] == Auth::id())
                <div class="col-3">
                    <a href="{{ route('posts.create') }}">
                    <button class='btn btn-danger w-50'>新規登録</button>
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{ route('account.data') }}">
                    <button class='btn btn-danger w-50'>アカウント情報</button>
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{ route('like', $user->id) }}">
                    <button class='btn btn-danger w-50'>いいね欄</button>
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{ route('post.list') }}">
                    <button class='btn btn-danger w-50'>投稿一覧</button>
                    </a>
                </div>
                @else
                <div class="col-3">
                    <a href="{{ route('users_post.list',$user['id']) }}">
                    <button class='btn btn-danger w-50'>投稿一覧</button>
                    </a>
                </div>
                @endif
            </div>
            <dev class='d-flex justify-content-center mt-2'>
                <button class='btn btn-secondary' onclick="history.back()">戻る</button>
            </dev>
        </div>
        </main>
</div>
@endsection
