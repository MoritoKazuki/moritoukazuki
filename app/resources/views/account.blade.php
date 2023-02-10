@extends('layouts.app')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <a href="{{ route('photos.create') }}">
                    <button class='btn btn-danger'>新規登録</button>
                    </a>
                </div>
                <div class="col-3">
                    <a href="">
                    <button class='btn btn-danger'>アカウント情報</button>
                    </a>
                </div>
                <div class="col-3">
                    <a href="">
                    <button class='btn btn-danger'>いいね欄</button>
                    </a>
                </div>
                <div class="col-3">
                    <a href="">
                    <button class='btn btn-danger'>投稿一覧</button>
                    </a>
                </div>
            </div>
        </div>
        </main>
</div>
@endsection
