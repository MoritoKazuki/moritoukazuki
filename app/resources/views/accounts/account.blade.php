@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="row justify-content-around">
        <div class="col-md-6">
            <div class="bg-secondary" style="height: 50px; letter-spacing: 8px; padding-top: 15px;">
                <div class='text-center text-white'>アカウント詳細</div>
            </div>
            <div class="border" style="background:#EEEEEE;">
                <div class="d-flex justify-content-center my-4">
                    <div class="mr-2">
                        <p>背景画</p>
                    </div>
                    <div>
                    @if($user['image']!==null)
                        <img src="{{ asset('storage/'.$user['image']) }}" style="width: 100%; height: 200px;  object-fit:cover; opacity: 0.7;">
                    @else
                        <img src="{{ asset('noimage.png') }}" style="width: 100%; height: 200px;  object-fit:cover; opacity: 0.7;">
                    @endif
                    </div>
                </div>
                <div style="margin-bottom: 20px;">
                    <div class="d-flex justify-content-center my-4">
                        <div class="mr-2">ユーザー名</div>
                        <div>{{$user->name}}</div>
                    </div>
                    <div class="">
                        <div class="d-flex justify-content-center">一言コメント</div>
                        <div class="text-center w-75" style="margin: auto;">{{$user->profile}}</div>
                    </div>
                </div>
            </div>
                                        
            <div class = "d-flex justify-content-around border" style="margin: 10px 0px; background:#EEEEEE; height:70px; padding-top: 20px;">
                <dev class='d-flex justify-content-center ml-6'>
                    <a href="{{ route('account.delete') }}">
                        <button class='btn btn-outline-danger' onclick='return confirm("削除しますか？")'>削除</button>
                    </a>
                </dev>
                <dev class='d-flex justify-content-center'>
                    <a href="{{ route('account.edit') }}">
                        <button class='btn btn-warning text-white' style="background:#9999CC;">編集する</button>
                    </a>
                </dev>
                <dev class='d-flex justify-content-center mr-6'>
                    <button class='btn btn-secondary' onclick="history.back()" style="height:37px;">戻る</button>
                </dev>
            </div>
        </div>
    </div>
</main>
@endsection