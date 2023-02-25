@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">ユーザー名</th>
      <th scope="col">投稿数</th>
      <th scope="col">詳細</th>
      <th scope="col">削除</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->posts_count}}</td>
      <td>
        <a href="{{ route('user_page.data',$user->id) }}">
          ユーザーページへ
        </a>
      </td>
      <td>
      <dev class='d-flex mr-5 mt-2'>
                  <a href="{{ route('user_page.delete',$user->id) }}">
                   <button class='btn btn-danger' onclick='return confirm("削除しますか？")'>削除</button>
                  </a>
                </dev>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    </div>
</div>
@endsection