@extends('app')

@section('content')



    <h1>
      {{ $book->name }}
    </h1>

    <div class = "body">
      <img src ="{{ $book->image }}" alt="No Image Available">
    <h3>ISBN: {{ $book-> isbn }}</h3>

    <h3>Authors: {{ $author-> name }}</h3>

    <h3>Publisher: {{ $book-> publisher }}</h3>

    <h3>Published: {{ $pubyear }}</h3>

    <td><button onclick="location.href='{{ url('admin/books/editbook', ['id' => $book->id]) }}'" class="btn btn-default">Edit: Book/Author</button></td>

    @foreach($comments as $comment)
      @foreach($users as $user)

        @if($comment->book_id == $book->id && $user->id == $comment->user_id)
          <h3 style='color:red'>{{$user->email}}:</h3>
          <p>{{$comment->text}}</p>
        @endif

      @endforeach

    @endforeach




@stop
