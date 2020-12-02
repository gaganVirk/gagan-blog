@extends('layouts.wrapper')

@section('title', 'Favourite Books')
@section('content')

@if(count($books) > 0)
    <div class="my-4 grid grid-cols-4 gap-4">
    @foreach($books as $book)
        <div class="text-center">
        <img class="m-auto" src="{{ $book->images->first()->path }}" alt="screenshot" height="150" width="150" >
        <a class="text-xl" href="{{ route('books.show',$book) }}">{{ $book->title }}</a>
        <p>{!! Str::limit($book->content, 20) !!}</p>
        <small>Written on {{ $book->created_at }}</small>
        </div>
    @endforeach
    </div>
@else
        <p>No book reviews found</p>
@endif

{{ $users->links() }}

@endsection

