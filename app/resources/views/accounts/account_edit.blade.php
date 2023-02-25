@extends('layouts.app')

@section('content')
    <main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
            
                <div class="card-header">
                    <h4 class='text-center'>アカウント編集</h1>
                </div>
                <div class="card-body">
                <div class = 'panel-body'>
                            @if($errors->any())
                            <div class='alert alert-danger'>
                                <ul>
                                    @foreach($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        
                        <form action="{{ route('edit.post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for='name'>ユーザー名</label>
                                <input type='text' class='form-control' name='name' value="{{ $user['name']}}"/>
                            <label for='image'>背景画像</label>
                            
                                <input type="file" name="image"/></br>
                            <label for='profile'>一言コメント</label>
                                <input type='text' class='form-control' name='profile' value="{{ $user['profile']}}"/>

                            <!-- <label for='date' class='mt-2'>日付</label>
                                <input type='date' class='form-control' name='date' id='date' value=""/> -->
                            <!-- <label for='type' class='mt-2'>カテゴリ</label>
                            
                            <a href="">カテゴリ追加</a>
                            </br>
                            <label for='comment' class='mt-2'>コメント</label>
                                <textarea class='form-control' name='comment'></textarea> -->
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