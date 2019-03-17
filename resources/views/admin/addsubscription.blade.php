@extends('app')

@section('content')

  <h1>Add a Subscription</h1>

  <hr/>


  {!! Form::open(['url' => 'admin/addsubscription']) !!}

    <div class="form-group">

    <label for="book">Book:</label>
    <select name='book'>
      @foreach($books as $book)
        <option value="{{$book->id}}">{{$book->name}}</option>
      @endforeach
    </select>

    </div>

    <div class="form-group">

      <label for="user">User:</label>
      <select name='user'>
        @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->email}}</option>
        @endforeach
      </select>
    </div>



    <div class="form-group">
      {!! Form::submit('Add Subscription', ['class' => 'btn btn-primary form-control']) !!}
    </div>


  {!! Form::close() !!}


@stop
