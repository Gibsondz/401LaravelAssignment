@extends('app')

@section('content')

  <h1>Comments</h1>

  @foreach($comments as $comment)


    @foreach($books as $book)
      @if($book->id == $comment->book_id)
        <h3 style= 'color:red'>{{ $book->name }}</h3>
      @endif
    @endforeach

    <h3>By:

    @foreach($users as $user)
      @if($user->id == $comment->user_id)
        {{ $user->email }}
      @endif
    @endforeach
    </h3>

    <h3>Comment: {{ $comment->text }}</h3>






  @endforeach


@stop
