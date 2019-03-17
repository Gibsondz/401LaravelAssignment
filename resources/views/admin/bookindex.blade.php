@extends('app')

@section('content')

  <h1>Books</h1>

  <td><button onclick="location.href='{{ url('/admin/addbook') }}'" class="btn btn-default">Add Book/Author</button></td>

  @foreach($books as $book)

    <article>
      <h2>
      <a href="{{ url('/admin/books', $book->id) }}">{{ $book->name }}</a>
      </h2>

      <div class = "body">
        <img src ="{{ $book->image }}" alt="No Image Available">
      </div>
    </article>


    <form action="{{ url('admin/books/delete', ['id' => $book->id]) }}" method="post">
    <input class="btn btn-default" type="submit" value="Delete"/>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

  @endforeach


@stop
