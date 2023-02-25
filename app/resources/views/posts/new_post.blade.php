@extends('layouts.app')

@section('content')
<main class="py-4">
    <div id="wrapper">
        <div class="col-md-5 mx-auto">
            <div class="card">
            
                <div class="card-header">
                    <h4 class='text-center'>新規投稿
                    </h1>
                </div>
                <div class="card-body">
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
                        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for='title'>タイトル</label>
                                <input type='text' class='form-control' name='title' value="{{ old('title')}}"/>
                            <label for='pet'>ペットのお名前</label>
                                <input type='text' class='form-control' name='pet' value="{{ old('pet')}}"/>
                            <label for='date' class='mt-2'>日付</label>
                                <input type='date' class='form-control' name='date' id='date' value="{{ old('date')}}"/>
                            <label for='category' class='mt-2'>種類</label>
                            <select name='category_id' class='form-control'>
                                <option value="" hidden>例：猫</option>
                                @foreach($categories as $category)
                                <option value="{{ $category['id'] }}" @if (old('category_id') == $category['category']) selected @endif>{{ $category['category'] }}</option>
                                @endforeach
                            </select>
                            </br>
                            <p>画像追加
                            </br>
                            
                            <input type="file" name="image" value="">
                            </p>
                            </br>
                            <label for='episode' class='mt-2'>エピソード</label>
                                <textarea class='form-control' name='episode'>{{ old('episode')}}</textarea>
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
