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
                                        <th scope='col'>ユーザー名</th>
                                        <th scope='col'>背景画</th>
                                        <th scope='col'>一言コメント</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ここに支出を表示する -->
                                    <tr>
                                        <th scope='col'>{{$user->name}}</th>
                                        <th scope='col'><img src="{{ asset('storage/'.$user->image) }}" width='150' height='200'></th>
                                        <th scope='col'>{{$user->profile}}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class = "d-flex justify-content-center">
                <dev class='d-flex justify-content-center mr-5 mt-2'>
                  <a href="{{ route('account.delete') }}">
                   <button class='btn btn-danger' onclick='return confirm("削除しますか？")'>削除</button>
                  </a>
                </dev>
                <dev class='d-flex justify-content-center mr-5 mt-2'>
                <a href="{{ route('account.edit') }}">
                  <button class='btn btn-danger'>編集する</button>
                </a>
                </dev>
                <dev class='d-flex justify-content-center mr-5 mt-2'>
                  
                   <button class='btn btn-secondary' onclick="history.back()">戻る</button>
                  
                </dev>
            </div>
        </main>
@endsection