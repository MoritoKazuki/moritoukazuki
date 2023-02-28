@extends('layouts.app')

@section('content')

<main class="container">
    <div class="card">
        <div class="card-header border border-5" style="background:#EEFFFF; letter-spacing: 10px;">
            <div class='text-center font-weight-bold'>投稿詳細</div>
        </div>
        <div class="card-body border border-5" style="background:#EEEEEE;">
            <div class="card-body">
                <div class="d-flex">
                    <div class="container w-50">
                        <p class="font-weight-bold rounded bg-info w-25 text-center">画像</p>
                        <img src="{{ asset('storage/'.$items['image']) }}" class="card-img-top" style="height:250px; width:250px; object-fit:cover;"></th>
                    </div>
                    <div class="container border border-5" style="background:white;">
                        <table style="width: 100%;">
                            <tr style="height: 50px;">
                                <th style="width: 25%;">タイトル</th><td style="width: 75%;">{{$items->title}}</td>
                            </tr>
                            <tr style="height: 50px;">
                                <th>年月日</th><td>{{$items->date}}</td>
                            </tr>
                            <tr style="height: 50px;">
                                <th>ペットのお名前</th><td>{{$items->pet}}</td>
                            </tr>
                            <tr style="height: 50px;">
                                <th>種類</th><td>{{$items->category->category}}</td>
                            </tr>
                            <tr style="height: 50px;">
                                <th>エピソード</th><td>{{$items->episode}}</td>
                            </tr>
                        </table>
                    </div>
                </div>


                            <div class="card-body line-height">
                            <a class="light-color post-time no-text-decoration" href="/articles/"></a>
                            <hr>
                            <div class="row actions" id="comment-form-article-">
                            <form class="w-100" id="new_comment" action="{{route('comment', ['comment_id'=>$items->id])}}" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="&#x2713;" />
                            {{csrf_field()}}
                            <input value="" type="hidden" name="article_id" />
                            <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                            <input class="form-control comment-input border-2" placeholder="コメント ..." autocomplete="off" type="text" name="comment" />
                            <button class='btn btn-secondary'>コメントする</button>
                           </form>
                         </div>
                       </div>

                    <div class='card'>
                    <p class="border">コメント一覧</p>
                    @foreach($comments as $comment)
                    @if($comment!==null)
                    <div class="d-flex justify-content-between">
                        <p class="my-2">{{$comment['text']}}</p>
                        @if($comment['user_id'] == Auth::id())
                        <form action="{{route('comment.delete',['comment_id' => $comment['id']])}}" method="post" class="float-right">
                            @csrf
                            @method('delete')
                            <input type="submit" value="取消" class="btn btn-outline-danger" style="padding: 2%; margin-top: 5px;" onclick='return confirm("削除しますか？");'>
                        </form></br>
                        @endif
                    </div>
                    @endif
                    @endforeach
                </div>

                        </div>
                    
                

                <div class = "d-flex justify-content-around">
                    @if(Auth::user()->id == $items->user_id)
                    {{-- 削除ボタン --}}
                    <form action="{{route('posts.destroy', $items->id)}}" method="post" class="float-right">
                        @csrf
                        @method('delete')
                        <input type="submit" value="削除" class="btn btn-outline-danger" onclick='return confirm("削除しますか？");'>
                    </form>
                        <a href="{{ route('posts.edit',['post'=>$items->id]) }}">
                        <button class='btn text-white' style="background:#9999CC;">編集する</button>
                        </a>
                    @endif
                </div>
                </div>
        </main>
@endsection
