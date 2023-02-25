@extends('layouts.app')

@section('content')

@foreach($items as $item)
<img src="{{ asset('storage/'.$item['image']) }}" width='300' height='300'>
<th scope='col'>
<a href="{{ route('posts.show',['post'=>$item->id]) }}">詳細</a>
</th>
@endforeach

@endsection
