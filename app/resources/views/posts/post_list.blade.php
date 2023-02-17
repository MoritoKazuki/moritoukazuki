@extends('layouts.app')

@section('content')

@foreach($items as $item)
<img src="{{ asset('storage/'.$item['image']) }}" width='150' height='200'>
<th scope='col'>
<a href="{{ route('photos.show', $item->id) }}">詳細</a>
</th>
@endforeach
@endsection
