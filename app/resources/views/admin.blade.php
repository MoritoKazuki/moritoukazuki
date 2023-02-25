@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="container">
    <div class="card-body">
    <div class='text-center'>
    <table class="table table-borderless">
  <tbody>
    <tr>
    <th scope="col">
        <a href="{{ route('admin.user') }}">
            <button class='btn btn-danger w-50'>ユーザー 一覧</button>
        </a>
      </th>
    </tr>
    <tr>
    <th scope="col">
        <a href="{{ route('admin.post') }}">
           <button class='btn btn-danger w-50'>投稿 一覧</button>
        </a>
      </th>
    </tr>
  </tbody>
</table>
    </div>
</div>
</div>
</div>
    

@endsection