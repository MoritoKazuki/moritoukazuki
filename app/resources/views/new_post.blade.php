@extends('layouts.app')

@section('content')
<main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
            
                <div class="card-header">
                    <h4 class='text-center'>支出</h1>
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
                        <form action="" method="post">
                            @csrf
                            <label for='amount'>タイトル</label>
                                <input type='text' class='form-control' name='amount' value=""/>
                            <label for='amount'>ペットのお名前</label>
                                <input type='text' class='form-control' name='amount' value=""/>
                            <label for='date' class='mt-2'>日付</label>
                                <input type='date' class='form-control' name='date' id='date' value=""/>
                            <label for='type' class='mt-2'>種類</label>
                            <select name='type_id' class='form-control'>
                                <option value="" hidden>種類</option>
                             
                                <option value=""></option>
                                
                            </select>
                            <a href="{{}}">種類追加</a>
                            </br>
                            <p>画像追加
                            </br>
                            <input type="file" name="image">
                            </p>
                            </br>
                            <label for='comment' class='mt-2'>コメント</label>
                                <textarea class='form-control' name='comment'></textarea>
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
