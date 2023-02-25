@extends('layouts.app')

@section('content')
    <main class="py-4 ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="text-info">ようこそペット暮らしnetへ!!</h3>
                    <div>ここでは、みんなでペットの画像などを共有することで、癒されるのを目的としたサイトです。
                    <p>自分で飼っているペットをアップするも良し、にやにやと眺めるも良し。きっとあなたの疲れを癒してくれるでしょう。</p>
                    <p>家庭の事情やアレルギーなどでペットを飼えない人にも動物を近くに感じていただければと思います。</p>
                    <p>ぜひご投稿ください。</p>
                    </div>
                </div>
                <div class="col-2">
                @can ('user-higher')
                    <div class='text-right'>
                     <a href="{{ route('my_page.data') }}">
                         <button type="button" class="btn btn-info btn-lg">マイページ</button>
                     </a>
                    </div>
                    @endcan
                    <form method="GET" action="{{ route('search') }}">
                        <input type="search" placeholder="タイトルを入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit">検索</button>
                                <button>
                                <a href="{{ route('home') }}" class="text-white">クリア</a>
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
  
        <div class="row justify-content-around center">
            @foreach($items as $item)
                <div class="card mb-3" style="width: 20rem;">
                    <img src="{{ asset('storage/'.$item['image']) }}" class="card-img-top" height='200'>
                <div class="card-body">
                    <h5 class="card-title">タイトル</h5>
                    <p class="card-text">{{$item->title}}</p>
                    <h5 class="card-title">お名前</h5>
                    <p class="card-text">{{$item->pet}}</p>
                    <a href="{{ route('posts.show',['post'=>$item->id]) }}">詳細</a>
                    <p><a href="{{ route('other.data',$item->user->id) }}">投稿者のマイページに進む</a></p>
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
          
    </main>
@endsection
