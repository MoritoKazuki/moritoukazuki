@extends('layouts.app')

@section('content')

<div class="row justify-content-around">
            @foreach($items as $item)
                <div class="card mb-3" style="width: 20rem;">
                    <img src="{{ asset('storage/'.$item['image']) }}" class="card-img-top" height='200'>
                <div class="card-body">
                    <h5 class="card-title">タイトル</h5>
                    <p class="card-text">{{$item->title}}</p>
                    <h5 class="card-title">お名前</h5>
                    <p class="card-text">{{$item->pet}}</p>
                    <h5 class="card-title">投稿者</h5>
                    <p class="card-text">{{$item->user['name']}}</p>
                    <p><a href="{{ route('posts.show',['post'=>$item->id]) }}">詳細</a></p>
                </div>
                </div>
            @endforeach
            <dev class='d-flex justify-content-center mt-2'>
                <button class='btn btn-secondary' onclick="history.back()">戻る</button>
            </dev>
        </div>

@endsection
