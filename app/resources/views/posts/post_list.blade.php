@extends('layouts.app')

@section('content')
<main class="container">
<div class="card" style="background:#EEEEEE;">
    <div class="card w-50 mx-auto my-3 text-center" style="background:#EEFFFF; letter-spacing: 8px;">
        <p class="my-4 font-weight-bold">投稿一覧</p>
    </div>
    <div class="row justify-content-around">
        @foreach($items as $item)
            <div class="card mb-3">
                    <img src="{{ asset('storage/'.$item['image']) }}" class="card-img-top" style="height:200px; width:300px; object-fit:cover;">
                <div class="card-body">
                    <div class="card">
                        <div class="card-header font-weight-bold">タイトル</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$item->title}}</li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-header font-weight-bold">お名前</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$item->pet}}</li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-header font-weight-bold">投稿者</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$item->user['name']}}</li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-header font-weight-bold">種類</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$item->category->category}}</li>
                        </ul>
                    </div>
                    <div class="mt-2 text-right"><a href="{{ route('posts.show',['post'=>$item->id]) }}">詳細>></a></div>
                </div>
            </div>
        @endforeach
    </div>
    <dev class='d-flex justify-content-center my-2'>
        <button class='btn btn-secondary' onclick="history.back()">戻る</button>
    
    </dev>
</main>

@endsection
