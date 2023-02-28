@extends('layouts.app')

@section('content')
    <main class="container">
        <div class="border border-secondary" style="background:#DDFFFF; padding: 10px;">
            <h3 class="text-info">
                <i class="fas fa-cat"></i>
                    ようこそペット暮らしnetへ
                <i class="fas fa-cat"></i>
            </h3>
            <div class="text-left">ここでは、みんなでペットの画像などを共有することで、癒されるのを目的としたサイトです。
                <p>自分で飼っているペットをアップするも良し、にやにやと眺めるも良し。きっとあなたの疲れを癒してくれるでしょう。</p>
                <p>家庭の事情やアレルギーなどでペットを飼えない人にも動物を近くに感じていただければと思います。</p>
                <p>ぜひご投稿ください。</p>
            </div>
        </div>
                    
        <form method="GET" action="{{ route('search') }}">
            <div class="d-flex justify-content-end my-4">
                <input class='mx-3 col-md-3' type="search" placeholder="種類、ペットのお名前を検索" name="search" value="@if (isset($search)) {{ $search }} @endif">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-success">検索</button>
                    <a href="{{ route('home') }}" class="btn btn-secondary mx-3">クリア</a>
                </div>
            </div>
        </form>
  
        <div class="card" style="background:#EEEEEE;">
        <h1 class="text-center text-info" style="background:#DDFFFF; padding:5px;">みんなの投稿</h1>
        <div class="row justify-content-around center mt-3">
            @foreach($items as $item)
                <div class="card mb-3">
                    <img src="{{ asset('storage/'.$item['image']) }}" class="card-img-top" style="height:200px; width:300px; object-fit:cover;">
                <div class="card-body">
                    <div class="card">
                        <div class="card-header font-weight-bold">タイトル</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$item->title}}</li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-header font-weight-bold">お名前</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$item->pet}}</li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-header font-weight-bold">投稿者</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$item->user['name']}}</li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-header font-weight-bold">種類</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$item->category->category}}</li>
                        </ul>
                    </div>
                    <div class="mt-2 text-right"><a href="{{ route('posts.show',['post'=>$item->id]) }}">詳細>></a></div>
                
                    <p><a href="{{ route('other.data',$item->user->id) }}"><i class="fas fa-user-circle"></i>投稿者のマイページに進む</a></p>
                    @if($like_model->like_exist(Auth::user()->id,$item->id))
                     <p class="favorite-marke">
                      <p class="js-like-toggle loved" data-postid="{{ $item->id }}"><i class="fas fa-heart"></i></p>
                      
                     </p>
                    @else
                     <p class="favorite-marke">
                      <p class="js-like-toggle" data-postid="{{ $item->id }}"><i class="fas fa-heart"></i></p>
                      
                    </p>
                    @endif
                    </div>
                </div>
            @endforeach
        </div>
        </div>
          
    </main>
@endsection

