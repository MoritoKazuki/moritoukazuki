@extends('layouts.app')

@section('content')
<main class="container w-50">
    <div class="card">
        <div class="card-header border border-5" style="background:#EEFFFF; letter-spacing: 10px;">
            <h4 class='text-center mt-2'>アカウント編集</h1>
        </div>
                <div class="card-body border border-5">
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
                                <table style="width: 100%;">
                                    <tr style="height: 80px;">
                                        <label for='image'><th style="width: 25%;">背景画像</th></label>
                                        <td style="width: 75%;"><input type="file" name="image"/></br></td>
                                    </tr>
                                    <tr style="height: 80px;">
                                        <label for='name'><th>ユーザー名</th></label>
                                        <td><input type='text' class='form-control' name='name' value="{{ $user['name']}}"/></td>
                                    </tr>
                                    <tr style="height: 80px;">
                                        <label for='profile'><th>一言コメント</th></label>
                                        <td><input type='text' class='form-control' name='profile' value="{{ $user['profile']}}"/></td>
                        </table>
                        <div class='row justify-content-center'>
                            <button type='submit' class='btn btn-dark w-25 mt-3'>変更する</button>
                        </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection

    <!-- <label for='name'>ユーザー名</label>
                                <input type='text' class='form-control w-75' name='name' value="{{ $user['name']}}"/>
                            </div>
                            <div class="d-flex my-3 justify-content-around">
                                <label for='profile'>一言コメント</label>
                                <input type='text' class='form-control w-75' name='profile' value="{{ $user['profile']}}"/>
                            </div>
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-dark w-25 mt-3'>変更する</button>
                            </div> 
                            <table style="width: 100%;">
                            <tr style="height: 50px;">
                                <th style="width: 25%;">背景画像</th>
                                <td style="width: 75%;"><input type="file" name="image"/></br></td>
                            </tr>
                            <tr style="height: 50px;">
                                <th>ユーザー名</th>
                                <td><input type='text' class='form-control' name='name' value="{{ $user['name']}}"/></td>
                            </tr>
                            <tr style="height: 50px;">
                                <th>一言コメント</th>
                                <td><input typ