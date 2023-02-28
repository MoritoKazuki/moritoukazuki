@extends('layouts.app')

@section('content')
<main class="container w-50">
    <div class="card">
                <div class="card-header border border-5" style="background:#EEFFFF; letter-spacing: 10px;">
                    <h4 class='text-center mt-2' >投稿編集</h4>
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
                        <form action="{{ route('posts.update',['post'=>$post->id]) }}" method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="d-flex justify-content-around">
                            <div>
                            <p class="font-weight-bold">画像</p>
                                <img src="{{ asset('storage/'.$post['image']) }}" width='150' height='200'>
                            </div>
                            <div>
                                <p class="my-5 text-danger">
                                    変更する場合は画像ファイルを選択して下さい。</br>
                                    表示されているのは現在登録している画像です。</br>
                                    画像変更しない場合は選択しないでください。
                                </p>
                                <input type="file" name="image" value="{{ $post['image']}}">
                            </div>
                            </div>
                            <table style="width: 100%;">
                                <tr style="height: 80px;">
                                    <label for='title'><th style="width: 25%;">タイトル</th></label>
                                    <td style="width: 75%;"><input type='text' class='form-control' name='title' value="{{ old('title',$post['title'])}}"/></td>
                                </tr>
                                <tr style="height: 80px;">
                                    <label for='pet'><th style="width: 25%;">ペットのお名前</th></label>
                                    <td style="width: 75%;"><input type='text' class='form-control' name='pet' value="{{ old('title',$post['pet'])}}"/></td>
                                </tr>
                                <tr style="height: 80px;">
                                    <label for='date'><th style="width: 25%;">日付</th></label>
                                    <td style="width: 75%;"><input type='date' class='form-control' name='date' id='date' value="{{ old('title',$post['date'])}}"/></td>
                                </tr>
                                <tr style="height: 80px;">
                                    <label for='category' class=''><th style="width: 25%;">種類</th></label>
                                    <td style="width: 75%;">
                                <select name='category_id' class='form-control'>
                                    @foreach($categories as $category)
                                    @if($post['category_id'] == $category['id'])
                                    <option value="{{ $category['id']}}" selected>{{ $category['category'] }}</option>
                                    @else
                                    <option value="{{ $category['id']}}">{{ $category['category'] }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                    </td>
                                </tr>
                                <tr style="height: 80px;">
                                    <label for='episode' class='mt-2'><th style="width: 25%;">エピソード</th></label>
                                    <td style="width: 75%;"><textarea class='form-control' name='episode'>{{ old('episode',$post['episode'])}}</textarea></td>
                                </tr>
                            </table>
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-dark w-25 mt-3'>登録</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
