@extends('layouts.app')

@section('content')
<main class="py-4">
            <div class="row justify-content-around">
                <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class='text-center'>詳細</div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th scope='col'>画像</th>
                                        <th scope='col'>タイトル</th>
                                        <th scope='col'>年月日</th>
                                        <th scope='col'>ペットの名前</th>
                                        <th scope='col'>種類</th>
                                        <th scope='col'>コメント</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ここに支出を表示する -->
                                    <tr>
                                        <th scope='col'><img src="{{ asset('storage/'.$items['image']) }}" width='150' height='200'></th>
                                        <th scope='col'>{{$items->title}}</th>
                                        <th scope='col'>{{$items->date}}</th>
                                        <th scope='col'>{{$items->pet}}</th>
                                        <th scope='col'>{{$items->category->category}}</th>
                                        <th scope='col'>{{$items->episode}}</th>
                                    </tr>
                                </tbody>
                            </table>
                            <div class='container'>
                             <p>コメント一覧</p>
                             @foreach($comments as $comment)
                                @if($comment!==null)
                                <div class="d-flex justify-content-between">
                                    <p>{{$comment['text']}}</p>
                                    @if($comment['user_id'] == Auth::id())
                                    <form action="{{route('comment.delete',['comment_id' => $comment['id']])}}" method="post" class="float-right">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
                                    </form></br>
                                    @endif
                                </div>
                                @endif
                             @endforeach
                            </div>

                            <div class="card-body line-height">
                            <a class="light-color post-time no-text-decoration" href="/articles/"></a>
                            <hr>
                            <div class="row actions" id="comment-form-article-">
                            <form class="w-100" id="new_comment" action="{{route('comment', ['comment_id'=>$items->id])}}" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="&#x2713;" />
                            {{csrf_field()}}
                            <input value="" type="hidden" name="article_id" />
                            <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                            <input class="form-control comment-input border-0" placeholder="コメント ..." autocomplete="off" type="text" name="comment" />
                            <button class='btn btn-secondary'>コメントする</button>
                           </form>
                         </div>
                       </div>

                        </div>
                    </div>
                </div>
                <div class = "d-flex justify-content-center">
                @if(Auth::user()->id == $items->user_id)
                 {{-- 削除ボタン --}}
                  <form action="{{route('posts.destroy', $items->id)}}" method="post" class="float-right">
                  @csrf
                  @method('delete')
                  <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
                  </form>
                  <dev class='d-flex justify-content-center mr-5 mt-2'>
                  <a href="{{ route('posts.edit',['post'=>$items->id]) }}">
                     <button class='btn btn-secondary'>編集</button>
                  </a>
                  </dev>
                @endif
                <dev class='d-flex justify-content-center mt-2'>
                
                <button class='btn btn-secondary' onclick="history.back()">戻る</button>
                </dev>
                </div>
              </div>
            </div>
        </main>
@endsection
