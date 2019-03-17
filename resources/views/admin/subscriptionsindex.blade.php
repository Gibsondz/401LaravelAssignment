@extends('app')

@section('content')

  <h1>Subscriptions</h1>

  <td><button onclick="location.href='{{ url('/admin/addsubscription') }}'" class="btn btn-default">Add Subscription</button></td>

  @foreach($subscriptions as $subscription)


    @foreach($books as $book)
      @if($book->id == $subscription->book_id)
        <h3 style= 'color:red'>{{ $book->name }}</h3>
      @endif
    @endforeach

    <h3>Subscribed By:</h3>

    @foreach($users as $user)
      @if($user->id == $subscription->user_id)
        <h3>{{ $user->email }}</h3>
      @endif
    @endforeach


    <form action="{{ url('admin/subscriptions/delete', ['id' => $subscription->id]) }}" method="post">
    <input class="btn btn-default" type="submit" value="Delete"/>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

  @endforeach


@stop
