@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">投稿ID</th>
      <th scope="col">タイトル</th>
      <th scope="col">種類</th>
      <th scope="col">名前</th>
      <th scope="col">詳細</th>
      <th scope="col">削除</th>
    </tr>
  </thead>
  <tbody>
  @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->category->category}}</td>
      <td>{{$post->pet}}</td>
      <td>
        <a href="{{ route('posts.show',['post'=>$post->id]) }}">投稿へ</a>
      </td>
      <td>
                  <a href="{{ route('user_post.delete',$post->id) }}">
                   <button class='btn btn-danger' onclick='return confirm("削除しますか？")'>削除</button>
                  </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    </div>
</div>
@endsection