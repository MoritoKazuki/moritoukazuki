@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="container">
        <div class="card rounded">
            <img src="{{ asset('admin.jpeg') }}" class="border border-5" style="width: 100%; height: 500px;  object-fit:cover;">
            <div class="card-img-overlay my-5">
                <div class='text-center'>
                    <table class="table table-borderless">
                        <tr>
                            <th scope="col">
                                <a href="{{ route('admin.user') }}">
                                    <button class='btn btn-danger w-50' style="background:#9999CC">ユーザー 一覧</button>
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col">
                                <a href="{{ route('admin.post') }}">
                                <button class='btn btn-danger w-50' style="background:#9999CC">投稿 一覧</button>
                                </a>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    

@endsection