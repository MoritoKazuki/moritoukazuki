@extends('layouts.app')

@section('content')
<main class="py-4">
            <div class="row justify-content-around">
                <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class='text-center'>詳細</div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th scope='col'>画像</th>
                                        <th scope='col'>タイトル</th>
                                        <th scope='col'>年月日</th>
                                        <th scope='col'>ペットの名前</th>
                                        <th scope='col'>種類</th>
                                        <th scope='col'>コメント</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ここに支出を表示する -->
                                    <tr>
                                        <th scope='col'><img src="{{ asset('storage/'.$item['image']) }}" width='150' height='200'></th>
                                        <th scope='col'>{{$items->title}}</th>
                                        <th scope='col'>{{$items->date}}</th>
                                        <th scope='col'>{{$items->pet}}</th>
                                        <th scope='col'>{{$items->category->category}}</th>
                                        <th scope='col'>{{$items->episode}}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class = "d-flex justify-content-center">
                <dev class='d-flex justify-content-center mr-5 mt-2'>
                  <a href="">
                   <button class='btn btn-danger'>削除</button>
                  </a>
                </dev>
                <dev class='d-flex justify-content-center mr-5 mt-2'>
                  <a href="{{ route('photos.edit',$item->id) }}">
                   <button class='btn btn-secondary'>編集</button>
                  </a>
                </dev>
                <dev class='d-flex justify-content-center mr-5 mt-2'>
                  <a href="{{ route('post.list') }}">
                   <button class='btn btn-secondary'>戻る</button>
                  </a>
                </dev>
            </div>
        </main>
@endsection
