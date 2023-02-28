@extends('layouts.app')

@section('content')
<main class="container w-50">
    <div class="card">
        <div class="card-header border border-5" style="background:#EEFFFF; letter-spacing: 10px;">
            <h4 class='text-center mt-2' >新規投稿</h4>
        </div>
                <div class="card-body border border-5">
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
                            <table style="width: 100%;">
                                <tr style="height: 80px;">
                                    <th style="width: 25%;">画像追加</th>
                                    <td style="width: 75%;"><input type="file" name="image" value=""></td>
                                </tr>
                                <tr style="height: 80px;">
                                    <label for='title'><th style="width: 25%;">タイトル</th></label>
                                    <td style="width: 75%;"><input type='text' class='form-control' name='title' value="{{ old('title')}}"/></td>
                                </tr>
                                <tr style="height: 80px;">
                                    <label for='pet'><th style="width: 25%;">ペットのお名前</th></label>
                                    <td style="width: 75%;"><input type='text' class='form-control' name='pet' value="{{ old('pet')}}"/></td>
                                </tr>
                                <tr style="height: 80px;">
                                    <label for='date'><th style="width: 25%;">日付</th></label>
                                    <td style="width: 75%;"><input type='date' class='form-control' name='date' id='date' value="{{ old('date')}}"/></td>
                                </tr>
                                <tr style="height: 80px;">
                                    <label for='category' class=''><th style="width: 25%;">種類</th></label>
                                    <td style="width: 75%;">
                                    <select name='category_id' class='form-control'>
                                        <option value="" hidden>例：猫</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category['id'] }}" @if (old('category_id') == $category['category']) selected @endif>{{ $category['category'] }}</option>
                                        @endforeach
                                    </select>
                                    </td>
                                </tr>
                                <tr style="height: 80px;">
                                    <label for='episode' class='mt-2'><th style="width: 25%;">エピソード</th></label>
                                    <td style="width: 75%;"><textarea class='form-control' name='episode'>{{ old('episode')}}</textarea></td>
                                </tr>
                            </table>
                                <div class='row justify-content-center'>
                                    <button type='submit' class='btn btn-dark w-25 mt-3'>投稿する</button>
                                </div> 


                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
