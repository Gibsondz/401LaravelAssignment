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

    </div>

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

        {!! Form::open(['url' => 'books/comment/' . $book->id]) !!}
          <div class="form-group">
            {!! Form::label('body', 'Leave a Comment:') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
          </div>
        {!! Form::close() !!}

      @endif

    @endforeach

    

    @foreach($comments as $comment)
      @foreach($users as $user)

        @if($comment->book_id == $book->id && $user->id == $comment->user_id)
          <h3 style='color:red'>{{$user->email}}:</h3>
          <p>{{$comment->text}}</p>
        @endif

      @endforeach

    @endforeach




@stop
