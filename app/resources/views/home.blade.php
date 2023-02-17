@extends('layouts.app')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <input type="text">
                    <a href="">
                    <button class='btn btn-danger'>検索</button>
                    </a>
                </div>
                <div class="col-3">
                    <input type="text">
                    <a href="">
                    <button class='btn btn-danger'>検索</button>
                    </a>
                </div>
                <div class="col-3">
                  <a href="{{ route('my_page.data') }}">
                   <button class='btn btn-danger'>マイページ</button>
                  </a>
                </div>
            </div>
        </div>

        <div class="container">
          <div>
            <img src="" alt="">画像
            <button class='btn btn-danger'>いいね</button>
            <a href="">詳細</a>
          </div>
          <div>
            <img src="" alt="">画像
            <button class='btn btn-danger'>いいね</button>
            <a href="">詳細</a>
          </div>
          <div>
            <img src="" alt="">画像
            <button class='btn btn-danger'>いいね</button>
            <a href="">詳細</a>
          </div>
          <div>
            <img src="" alt="">画像
            <button class='btn btn-danger'>いいね</button>
            <a href="">詳細</a>
          </div>
        </div>

          <div>
          <th scope='col'>
            <a href="">1</a>
          </th>
          <th scope='col'>
            <a href="">2</a>
          </th>
          <th scope='col'>
            <a href="">3</a>
          </th>
          <th scope='col'>
            <a href="">4</a>
          </th>
          <th scope='col'>
            <a href="">5</a>
          </th>
          </div>
        </main>
</div>
@endsection
