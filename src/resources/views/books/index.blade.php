@extends('layouts.wrapper')

@section('title', 'Read Books')
@section('content')

<div class="px-4 grid grid-flow-col gap-4">
    @if(count($books) > 0) 
        @foreach($books as $book)
        <a class="text-xl" href="/books/{{$book->id}}">{{ $book->title }}</a>
        <p>{{ Str::limit($book->body, 200) }}</p>
        <small>Written on {{ $book->created_at }}</small>
        <hr/>
        @endforeach
    @else
        <p>No book reviews found</p>
    @endif

    {{ $users->links() }}
</div>

@endsection

