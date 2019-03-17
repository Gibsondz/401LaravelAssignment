@extends('app')

@section('content')

  <h1>Books</h1>

  @if(Auth::user()->role == 'admin')
    <td><button onclick="location.href='{{ url('/admin') }}'" class="btn btn-default">Admin Page</button></td>
  @endif

  @foreach($books as $book)
    <article>
      <h2>
      <a href="{{ url('/books', $book->id) }}">{{ $book->name }}</a>
      </h2>

      <div class = "body">
        <img src ="{{ $book->image }}" alt="No Image Available">
      </div>
    </article>

    @if(Auth::user()->role == 'subscriber' && $book['subscription status'] != 'true')


      <form action="{{ url('/books/subscribe', ['id' => $book->id]) }}" method="post">
      <input class="btn btn-default" type="submit" value="Subscribe"/>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      </form>

    @endif

    @foreach($subscriptions as $subscription)

      @if(Auth::user()->id == $subscription->user_id && $book->id == $subscription->book_id && $book['subscription status'] == 'true')
        <form action="{{ url('/books/unsubscribe', ['id' => $book->id]) }}" method="post">
        <input class="btn btn-default" type="submit" value="Unsubscribe"/>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
      @endif

    @endforeach


  @endforeach


@stop
